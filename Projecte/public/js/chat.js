function AddMensaje(user, time, body) {
    user_id = $("meta[name='user']").attr("content");

    $message = $("<div>");

    $header = $("<div>").attr("class", "direct-chat-info clearfix");
    $name = $("<span>").text(user.name);
    $time = $("<span>").text(time);

    if (user_id != user.id) {
        $message.attr("class", "direct-chat-msg");

        $name.attr("class", "direct-chat-name float-left");
        $time.attr("class", "direct-chat-timestamp float-right");
    } else {
        $message.attr("class", "direct-chat-msg right");

        $name.attr("class", "direct-chat-name float-right");
        $time.attr("class", "direct-chat-timestamp float-left");
    }

    $header.append($name).append($time);
    $body = $("<div>").attr("class", "direct-chat-text").text(body);

    $("#chat").append($message.append($header).append($body));
}


Echo.private($("meta[name='room']").attr("content"))
.listen('NewMessageNotification', (e) => {
    data = moment(e.message.created_at).format();

    AddMensaje(e.user, data.substring(0, 10) + " " + data.substring(11, 19), CryptoJS.AES.decrypt(e.message.message, "WATCHWITHUS").toString(CryptoJS.enc.Utf8));

    $("#chat").scrollTop($("#chat")[0].scrollHeight);
});

// RECUPERAR MENSAJES //
fetch($("meta[name='allmessages']").attr("content"))
    .then(response => response.json())
    .then(function(messages) {
        messages["messages"].forEach(function(message, index) {
            AddMensaje(messages["users"][index], messages["times"][index], CryptoJS.AES.decrypt(message, "WATCHWITHUS").toString(CryptoJS.enc.Utf8));
        });

        $("#chat").scrollTop($("#chat")[0].scrollHeight);
});

// NUEVO MENSAJE //
let $chat = $("#message_form");

$chat.submit(function(event) {
    event.preventDefault(); 

    $.post($(this).attr("action"), { _token: $("meta[name='csrf-token']").attr("content"), chat: $("meta[name='chat']").attr("content"), body: CryptoJS.AES.encrypt($chat.children().children("#message").val(), "WATCHWITHUS").toString() })
    .done(function() {
        $chat.children().children("#message").val("");
    });
});

// RECUPERAR USUARIOS //
fetch($("meta[name='allusers']").attr("content"))
    .then(response => response.json())
    .then(function(users) {
        $li = $("<li>").attr("class", "list-group-item active");
        $p = $("<p>").text(users["owner"]).attr("class", "direct-chat-name float-left m-0");
        $("#participants").append($li.append($("<span>").append($p)));

        users["joineds"].forEach(function(user, index) {
            $li = $("<li>").attr("class", "list-group-item");
            $p = $("<p>").text(users["users"][index].name).attr("class", "direct-chat-name float-left m-0");
            $a = $("<a>").text("❌").attr("class", "direct-chat-name float-right text-decoration-none").attr("href", $("meta[name='removeuser']").attr("content") + "/" + users["users"][index].id);

            if ($("meta[name='user']").attr("content") == $("meta[name='owner']").attr("content")) {
                $li.append($("<span>").append($p).append($a));
            } else {
                $li.append($("<span>").append($p));
            }

            $("#participants").append($li);
        });
});

$("#copiar").click(function() {
    var $temp = $("<input>");
    $("body").append($temp);
    
    $temp.val($("#linkcompartir").text()).select();
    
    document.execCommand("copy");
    
    $temp.remove();

    $("#copiar").text("Enlace copiado!");
    setTimeout(() => {
        $("#copiar").text("Copiar el enlace!");
    }, 3000);
});