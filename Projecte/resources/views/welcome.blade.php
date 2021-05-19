<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-dark  border-gray-200 text-light backgrounDark" alt="background fosc">
                    <!---->
                     <!---->
                    
                    <!--Carousel de imatges-->
                    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="images/web/home1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="images/web/home2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="images/web/home3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!--Altres apartats en proces-->
                    <br><br><br>
                    <div class="col-md-12 col-12">
                        <h5 class="text-warning">Comparte con tus amigos el mejor contenido de la red a tiempo real</h5>
                        <br>
                        <p>Pasa el tiempo con tus amigos xarlando de los videos que estais viendo. Pasad el tiempo como siempre, todos juntos, pero con la seguridad de estar en tu casa sin preocuparte de llevar una mascarilla y llevar el gel hidroalgelico todo el rato.</p>
                    </div>
                    <div class="col-md-12 col-12">
                        <h5 class="text-warning">Disfruta de la proximidad que ofrece la red</h5>
                        <br>
                        <p>Con todo lo sucedido con la pandemia que todos estamos sufriendo, disfrutaa de pasar un buen rato con las personas que aprecias como si estuvierais todos en la misma habitación. Con "Watch With Us" comparte el mismo video al mismo tiempo i en el momento que alguien pause el video o lo adelante, la otra persona también tendrá lo mismo.</p>
                    </div>
                <!---->
                    <!---->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-application-footer></x-application-footer>