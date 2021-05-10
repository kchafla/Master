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
                        <h3>Hola {{ Auth::user()->name }}</h3><br><br><br>
                        <p>Per a compartir els vídeos únicament necessites compartir el teu link de la sala que acabes de crear.</p>
                        <h4>Aquí tens les teves sales actives: </h4>
                        <br><br>
                        Work in progress...
                   <!---->
                </div>
            </div>
        </div>
    </div>
    <x-application-footer></x-application-footer>
</x-app-layout>
