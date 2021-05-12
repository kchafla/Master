<head>
    <meta name="room" content="{{ $sala->id }}">
    <meta name="chat" content="{{ $chat }}">
    <meta name="lastvideo" content="{{ $video }}">
    <meta name="newvideo" content="{{ url('sala/'.$sala.'/video') }}">
    <meta name="allmessages" content="{{ url('sala/'.$sala.'/mensajes/'.$chat) }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/reproductor.js') }}" defer></script>
    <script src="{{ asset('js/chat.js') }}" defer></script>
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
                            <button id="buscar-video" class="col-md-1 btn btn-primary">Buscar</button>
                        </div>
                    </form>
                    
                    <div class="row">
                        <!--Apartat del video seleccionat-->
                        <div class="col-md-8" style="margin-top: 15px;">
                                <div class="col-md-12" style="padding: 10px; height: 460px">
                                    <div id="reproductor" style="width: 100%; height: 100%"></div>
                                </div>
                        </div>

                        <!--Apartat del chat-->
                        <div class="col-md-4" style="margin-top: 15px;">
                            <div class="col-md-12" style="padding: 10px;">    
                                <div id="chat" class="backgrounChat text-black">
                                
                                </div>
                                <form action="{{ url('sala/'.$sala.'/mensaje/'.$chat) }}" id="message_form">
                                    <input type="text" id="message" placeholder="Escriu un nou missatge..." class="col-md-10 text-dark">
                                    <button class="col-md-2 btn btn-primary">🔎</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="videos"></div>
                        </div>
                    </div>

                    <!---->
                </div>
            </div>
        </div>
    </div>
    <x-application-footer></x-application-footer>
</x-app-layout>