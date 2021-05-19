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
                        <h3>Editar los datos del usuario</h3><br><br><br>

                        <form action="{{ url('updateUser') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            Nuevo nombre: <br><input type="text" name="name" placeholder="{{Auth::user()->name}}" class="text-dark"><br><br>

                            Nuevo mail: <br><input type="text" name="email" placeholder="{{Auth::user()->email}}" class="text-dark"><br><br>

                            Nueva contraseña: <br><input type="password" name="password"><br><br>

                            Nuevo fondo de pantalla: <br><input type="file" name="background" accept="image/*"><br><br>

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
<x-application-footer></x-application-footer>