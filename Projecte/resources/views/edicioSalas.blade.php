<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-dark border-b border-gray-200 text-light backgrounDark">
                    <!---->
                    <div class="centrado">
                        @if (count($salas)>0)
                 
                        <!--Apartat per a modificar les dades de l'usuari-->
                        <h3>Editar les dades de la sala</h3><br><br><br>

                        
                            
                            <div class="row">
                                <b class="col-7 col-md-4">Nom de la sala</b><b class="ocultar col-md-2">Creada el dia</b><b class="ocultar col-md-2">Modificada</b><b class="col-2 col-md-2">Esborrar</b><b class="col-2 col-md-2">Aplicar canvis</b>
                            </div>
                            @foreach ($salas as $sala)
                                @if (Auth::user()->id == $sala->user_id)
                                    <form action="{{url('salasUpdate')}}" method="post">
                                    @csrf
                                        <div class="row">        
                                            <input type="text" placeholder="{{ $sala->name }}" name="name" class="col-7 col-md-4 text-dark"><p class="col-md-2 ocultar">{{ $sala->created_at }}</p><p class="col-md-2 ocultar">{{ $sala->updated_at }}</p><div class="col-2"><input type="checkbox" name="delete"></div><div class="col-2"><button type="submit" class="btn btn-primary">Aplicar canvis</button></div>                               
                                            <input type="hidden" value="{{ $sala->id }}" name="id">
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                        @else
                        <center><h2>No tens cap sala creada</h2></center><br>
                        <center><p>Crea una sala nova per a poder editar-la</p></center>
                        @endif
                    </div>
                    <!---->
                </div>
            </div>
        </div>
    </div>
    
    <x-application-footer></x-application-footer>
</x-app-layout>