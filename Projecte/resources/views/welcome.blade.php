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
                    <div id="carouselId" class="carousel slide" data-ride="carousel" data-interval="1000" aria="hidden">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselId" data-slide-to="1"></li>
                            <li data-target="#carouselId" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="images/web/home1.jpg" alt="Image1" height="50%"  class="responsive col-md-12 rounded">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/web/home2.jpg" alt="Image2" class="responsive col-md-12 rounded">
                            </div>
                            <div class="carousel-item">
                                <img src="images/web/home3.jpg" alt="Image3" class="responsive col-md-12 rounded">
                            </div>
                            
                        </div>
                        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
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