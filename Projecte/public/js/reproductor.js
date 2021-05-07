// CREAR EL REPRODUCTOR DE VIDEOS //
let tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
let firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('reproductor', {
        height: '360',
        width: '640',
        videoId: $("meta[name='lastvideo']").attr("content"),
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerReady(event) {
    Echo.private('reproductor')
    .listen('NewVideoNotification', (e) => {
        event.target.loadVideoById(e.video.link, 0, "default");
    })
    .listenForWhisper('activar', (e) => {
        event.target.playVideo();
    })
    .listenForWhisper('pausar', (e) => {
        event.target.pauseVideo();
    })
    .listenForWhisper('tiempo', (e) => {
        event.target.seekTo(e.tiempo);
    });
}

let done = false;
function onPlayerStateChange(event) {
    // REPRODUCTOR ACTIVADO //
    if (event.data == YT.PlayerState.PLAYING) {
        Echo.private('reproductor')
        .whisper('activar', {
            texto: "YT.PlayerState.PLAYING"
        });
    }
    // REPRODUCTOR EN PAUSA //
    if (event.data == YT.PlayerState.PAUSED) {
        Echo.private('reproductor')
        .whisper('pausar', {
            texto: "YT.PlayerState.PAUSED"
        });
    }
    // CAMBIAR EL TIEMPO DEL REPRODUCTOR //
    if (event.data == YT.PlayerState.BUFFERING) {
        Echo.private('reproductor')
        .whisper('tiempo', {
            texto: "YT.PlayerState.BUFFERING",
            tiempo: event.target.getCurrentTime()
        });
    }
    if (event.data == YT.PlayerState.PLAYING && !done) {
        done = true;
    }
}

// BUSCADOR DE VIDEOS //
let $formulario = $("#buscar_form");

$formulario.submit(function( event ) {
    event.preventDefault(); 

    let key = "AIzaSyBsWcqtCv82R3xB1FjcCw1SSDE_avou5IE";
    let nom = $formulario.children().children("#buscar_nom").val();

    fetch("https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=20&q=" + nom + "&type=video&key=" + key)
    .then(response => response.json())
    .then(function(videos) {
        $("#videos").text("");

        let $row = $("<div>").attr("class", "row").attr("style", "padding: 10px;");
        videos.items.forEach((video, index) => {
            if (index % 4 == 0 && index != 0) {
                $("#videos").append($row);
                $row = $("<div>").attr("class", "row").attr("style", "padding: 10px;");
            }

            let $carta = $("<div>").attr("class", "col-md-3");
            let $imagen = $("<img>").attr("src", video.snippet.thumbnails.medium.url).attr("id", video.id.videoId).attr("alt", video.snippet.title);

            $imagen.click(function() {
                $.post($("meta[name='newvideo']").attr("content"), { _token: $("meta[name='csrf-token']").attr("content"), room: 1, link: $(this).attr("id") })
                .done(function() {
                    $("html, body").animate({scrollTop: 0}, 1000);
                });
            });

            $row.append($carta.append($imagen).append($("<p>").text(video.snippet.title)));
        });
    });
});
