Echo.private('reproductor')
.listen('NewMessageNotification', (e) => {
    $("#chat").append($("<p>").text(e.message.message));
})

// RECUPERAR MENSAJES //
fetch($("meta[name='allmessages']").attr("content") + "?chat=1")
    .then(response => response.json())
    .then(function(messages) {
        messages.forEach(message => {
            $("#chat").append($("<p>").text(message.message));
        });
});


// NUEVO MENSAJE //
let $chat = $("#message_form");

$chat.submit(function(event) {
    event.preventDefault(); 

    $.post($(this).attr("action"), { _token: $("meta[name='csrf-token']").attr("content"), chat: 1, body: $chat.children("#message").val() })
    .done(function() {
        $chat.children("#message").val("");
    });
}); 

