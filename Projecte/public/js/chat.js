Echo.private($("meta[name='room']").attr("content"))
.listen('NewMessageNotification', (e) => {
    $("#chat").append($("<p>").text(e.user + ": " + e.message.message).attr("title", "Enviat el dia " + e.message.created_at.substring(0, 10) + " a les " + e.message.created_at.substring(11, 19) + "."));
})

// RECUPERAR MENSAJES //
fetch($("meta[name='allmessages']").attr("content"))
    .then(response => response.json())
    .then(function(messages) {
        messages["messages"].forEach(function(message, index) {
            $("#chat").append($("<p>").text(message).attr("title", messages["times"][index]));
        });

        $("#chat").scrollTop($("#chat")[0].scrollHeight);
});

// NUEVO MENSAJE //
let $chat = $("#message_form");

$chat.submit(function(event) {
    event.preventDefault(); 

    $.post($(this).attr("action"), { _token: $("meta[name='csrf-token']").attr("content"), chat: $("meta[name='chat']").attr("content"), body: $chat.children("#message").val() })
    .done(function() {
        $chat.children("#message").val("");
        $("#chat").scrollTop($("#chat")[0].scrollHeight);
    });
});