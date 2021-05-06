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
                        <!--Apartat per a modificar les dades de l'usuari-->
                        <h3>Editar les dades de l'usuari</h3><br><br><br>

                        <form action="{{url('updateUser')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            Nou nom per a l'usuari: <br><input type="text" name="name" value="{{Auth::user()->name}}" class="text-dark"><br><br>

                            Nou mail per a l'usuari: <br><input type="text" name="email" value="{{Auth::user()->email}}" class="text-dark"><br><br>

                            Nova contrasenya usuari: <br><input type="password" name="password"><br><br>

                            Nou fons de pantalla: <br><input type="file" name="background"><br><br>

                            <input type="hidden" value="{{Auth::user()->id}}" name="id">

                            <input type="hidden" value="{{Auth::user()->background}}" name="actualBack">

                            <button type="submit" name="actualitzar" class="btn btn-primary rounded">Enviar</button>
                        
                        </form>
                    </div>
                    <!---->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>