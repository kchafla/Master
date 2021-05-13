<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-dark border-b border-gray-200 text-light backgrounDark">
                   <!---->
                        <h3>Hola {{ Auth::user()->name }}</h3>
                        <p>Para compartir los vídeos únicamente necessitas compartir el link de tu sala.</p>
                        
                        <h4>[{{ count($salas) }}/5] Aquí tienes tus salas: </h4>
                        @for ($i = 0; $i < count($salas); $i++)
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{ url('sala/'.$salas[$i]->id) }}"><img src="https://img.youtube.com/vi/{{ $videos[$i] }}/0.jpg" alt="Sala {{ $salas[$i]->name }}"></a>
                                </div>
                                <div class="col-md-9">
                                    <p>Nombre de la sala: {{ $salas[$i]->name }}</p>
                                    <p>Sala creada el: {{ $salas[$i]->created_at }}</p>
                                </div>
                            </div>
                            <br>
                        @endfor

                        @if (count($salas) == 5)
                            <p>No pots crear més sales!</p>
                        @elseif (count($salas) == 4)
                            <a href="{{ route('crear') }}"><button class="btn btn-danger">Crear una nueva sala</button></a>
                        @elseif (count($salas) < 4)
                            <a href="{{ route('crear') }}"><button class="btn btn-warning">Crear una nueva sala</button></a>
                        @elseif (count($salas) < 2)
                            <a href="{{ route('crear') }}"><button class="btn btn-primary">Crear una nueva sala</button></a>
                        @endif
                   <!---->
                </div>
            </div>
        </div>
    </div>
    <x-application-footer></x-application-footer>
</x-app-layout>
