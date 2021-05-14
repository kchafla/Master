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

    AddMensaje(e.user, data.substring(0, 10) + " " + data.substring(11, 19), e.message.message);

    $("#chat").scrollTop($("#chat")[0].scrollHeight);
});

// RECUPERAR MENSAJES //
fetch($("meta[name='allmessages']").attr("content"))
    .then(response => response.json())
    .then(function(messages) {
        messages["messages"].forEach(function(message, index) {
            AddMensaje(messages["users"][index], messages["times"][index], message);
        });

        $("#chat").scrollTop($("#chat")[0].scrollHeight);
});

// NUEVO MENSAJE //
let $chat = $("#message_form");

$chat.submit(function(event) {
    event.preventDefault(); 

    $.post($(this).attr("action"), { _token: $("meta[name='csrf-token']").attr("content"), chat: $("meta[name='chat']").attr("content"), body: $chat.children().children("#message").val() })
    .done(function() {
        $chat.children().children("#message").val("");
    });
});