<head>
    <meta name="lastvideo" content="{{ $video->link }}">
    <meta name="newvideo" content="{{ route('video') }}">
    <meta name="allmessages" content="{{ route('mensajes') }}">

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
                    <!---->
                    Pagina de videos
                    <form id="buscar_form">
                        <input type="text" name="nom" id="buscar_nom" class="col-md-12 text-dark">
                        <button>🔎</button>
                    </form>
                    <div class="row">
                        <!--Apartat del video seleccionat-->
                        <div class="col-md-8" height="2500" style="margin-top: 15px;">
                                <div class="col-md-12" style="padding: 10px; border-color: coral; border-width: 10px; height: 360px">
                                    <div id="reproductor" style="width: 100%; height: 100%"></div>
                                </div>
                        </div>

                        <!--Apartat del chat-->
                        <div class="col-md-4" style="margin-top: 15px;">
                            <div class="col-md-12" style="padding: 10px; border-color: coral; border-width: 10px; height: 360px;">    
                                <div id="chat"></div>
                                <form action="{{ route('mensaje') }}" id="message_form">
                                    <input type="text" id="message" placeholder="Escriu un nou missatge..." class="col-md-12 text-dark">
                                    <button>🔎</button>
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
</x-app-layout>