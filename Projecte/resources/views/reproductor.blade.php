<head>
    <meta name="room" content="{{ $sala->id }}">
    <meta name="chat" content="{{ $chat }}">
    <meta name="user" content="{{ Auth::id() }}">
    <meta name="owner" content="{{ $sala->user_id }}">
    <meta name="lastvideo" content="{{ $video }}">
    <meta name="newvideo" content="{{ url('sala/'.$sala->id.'/video') }}">
    <meta name="allvideos" content="{{ url('sala/'.$sala->id.'/videos') }}">
    <meta name="allmessages" content="{{ url('sala/'.$sala->id.'/mensajes/'.$chat) }}">
    <meta name="allusers" content="{{ url('sala/'.$sala->id.'/participantes') }}">
    <meta name="removeuser" content="{{ url('sala/'.$sala->id.'/expulsar') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/reproductor.js') }}" defer></script>
    <script src="{{ asset('js/chat.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/he/1.2.0/he.min.js" integrity="sha512-PEsccDx9jqX6Dh4wZDCnWMaIO3gAaU0j46W//sSqQhUQxky6/eHZyeB3NrXD2xsyugAKd4KPiDANkcuoEa2JuA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="{{ asset('css/prueba.css') }}">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-dark border-b border-gray-200 text-light backgrounDark">
                    <div class="offset-md-3 col-md-6 text-center">
                        <h1>{{ $sala->name }}</h1>
                    </div>
                    
                    <form id="buscar_form">
                        <div class="row">
                            <input type="text" name="nom" id="buscar_nom" class="offset-md-1 col-md-9 text-dark" placeholder="Buscar un video...">
                            <button id="buscar-video" class="col-12 col-md-1 btn btn-primary">Buscar</button>
                        </div>
                    </form>

                    <br>
                    
                    <div class="row" id="zona_videos">
                        <!--Apartat del video seleccionat-->
                        <div class="col-md-8">
                            <div id="reproductor" class="border border-white rounded w-100 h-100"></div>
                        </div>

                        <!--Apartat del chat-->
                        <div class="col-md-4">
                            <div class="box box-warning direct-chat direct-chat-warning">
                                <div class="box-header with-border">
                                    <div class="direct-chat-info clearfix m-0 p-0">
                                        <h3 class="float-left m-0" id="box-title">Chat</h3>
                                        <div class="dropdown float-right">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Menu
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" id="ir_chat">Chat</a>
                                                <a class="dropdown-item" id="ir_historial">Historial</a>
                                                <a class="dropdown-item" id="ir_participantes">Participantes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="chat_content" class="mostrando">
                                    <div class="box-body">
                                        <div id="chat" class="direct-chat-messages text-black">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <form action="{{ url('sala/'.$sala->id.'/mensaje/'.$chat) }}" id="message_form">
                                            <div class="input-group"> 
                                                <input type="text" id="message" name="message" placeholder="Enviar un mensaje..." maxlength="255" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button type="submit" class="btn btn-primary btn-flat">Enviar</button> 
                                                </span> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="video_content">
                                    <ol class="list-group direct-chat-messages p-2" id="historial">
                                    </ol>
                                </div>
                                <div id="participants_content">
                                    <ol class="list-group direct-chat-messages p-2" id="participants">
                                        <li class="list-group-item mb-2">
                                            <p class="text-center">Comparte el siguiente enlace para invitar a más usuarios!</p>
                                            <div class="row">
                                                <p class="text-truncate border border-dark p-2 rounded offset-1 col-10" id="linkcompartir">{{ url('sala/'.$sala->id.'/invitacion/'.$sala->token) }}</p>
                                                <button class="btn btn-primary float-right col-6 offset-3" id="copiar">Copiar el enlace!</button>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div id="videos" class="container p-0 m-0"></div>

                    <!---->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-application-footer></x-application-footer>