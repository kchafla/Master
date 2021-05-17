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
                        <h3 class="text-center">Hola, {{ Auth::user()->name }}!</h3>

                        <div class="text-center">
                            @if (count($salas) == 6)
                                <p>No pots crear més sales!</p>
                            @elseif (count($salas) < 2)
                                <a href="{{ route('crear') }}"><button class="btn btn-primary">Crear una nueva sala</button></a>
                            @elseif (count($salas) < 4)
                                <a href="{{ route('crear') }}"><button class="btn btn-warning">Crear una nueva sala</button></a>
                            @elseif (count($salas) < 6)
                                <a href="{{ route('crear') }}"><button class="btn btn-danger">Crear una nueva sala</button></a>
                            @endif
                        </div>
                        <br>

                        <div class="card text-center">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs d-flex justify-content-center">
                                    <li class="nav-item col-md-3">
                                        <a class="nav-link active bg-dark text-light" href="#">Tus salas</a>
                                    </li>
                                    <li class="nav-item col-md-3">
                                        <a class="nav-link" href="#">Otras salas</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body bg-dark">
                                <div class="row">
                                    @for ($i = 0; $i < count($salas); $i++)
                                        @if ($i == 3)
                                            </div>
                                            <div class="row mt-0 mt-md-3">
                                        @endif
                                        <div class="col-sm-4 mt-3 mt-md-0 border border-light">
                                            <div class="card bg-dark">
                                                <a href="{{ url('sala/'.$salas[$i]->id) }}"><img class="card-img-top" src="https://img.youtube.com/vi/{{ $videos[$i] }}/0.jpg" alt="Sala {{ $salas[$i]->name }}"></a>
                                                <div class="card-body">
                                                    <h5 class="card-title text-truncate" title="{{ $salas[$i]->name }}">{{ $salas[$i]->name }}</h5>
                                                    <p class="card-text">{{ $salas[$i]->created_at }}</p>
                                                    <div class="row">
                                                        <button class="btn-warning btn col-md-6" data-toggle="modal" data-target="#a{{ $salas[$i]->id }}">Editar</button>
                                                        <a href="{{ url('sala/'.$salas[$i]->id) }}" class="btn btn-primary col-md-6">Sala</a>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="a{{ $salas[$i]->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content bg-dark">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-light">Cambia el nombre de la sala</p><br>
                                                            <form action="{{url('salasUpdate')}}" method="post">
                                                            @csrf
                                                                <input class="text-dark" type="text" placeholder="{{ $salas[$i]->name }}" name="name">
                                                                <input type="hidden" value="{{ $salas[$i]->id }}" name="id">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                            </form>
                                                            <form action="{{url('delete')}}" method="post">
                                                            @csrf
                                                                <input type="hidden" value="{{ $salas[$i]->id }}" name="id">
                                                                <button type="submit" class="btn btn-danger">Borrar</button>
                                                            </form>
                                                            
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <!---->
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                            </div>
                        </div>
                   <!---->
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>
<x-application-footer></x-application-footer>