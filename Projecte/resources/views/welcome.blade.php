<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-dark border-b border-gray-200 text-light backgrounDark" alt="background fosc" aria="hidden">
                    <!---->
                     <!---->
                    
                    <!--Carousel de imatges-->
                    <div id="carouselId" class="carousel slide" data-ride="carousel" data-interval="1000">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselId" data-slide-to="1"></li>
                            <li data-target="#carouselId" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="images/web/home1.jpg" alt="Image1" height="50%"  class="responsive col-md-12 rounded">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-dark">Tots junts</h5>
                                    <p class="text-dark">Tots junts les coses són més divertides.</p>
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
                        <h5 class="text-info">Comparteix amb els teus amics el millor contingut a la xarxa a temps real</h5>
                        <br>
                        <p>Pasa el temps amb els teus amics parlant del video que esteu visualitzant. Paseu el temps com sempre, tots junts, pero amb la seguretat de estar a la teva casa sense preocuparte de portar una mascareta o gel per a les mans.</p>
                    </div>
                    <div class="col-md-12 col-12">
                        <h5 class="text-info">Gaudeix de la próximitat que ofereix la xarxa</h5>
                        <br>
                        <p>Amb tot el succeit amb la pandemia que tots estem patin, gaudeix de pasar un bon temps amb les persones que t'estimes com s'hi fossiu tots en la mateixa habitació. Amb "Watch With Us" compartiu el mateix video al mateix temps i en el moment que un dels dos pausi el video o l'avançi, l'altre també fará aquest canvi.</p>
                    </div>
                <!---->
                    <!---->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>