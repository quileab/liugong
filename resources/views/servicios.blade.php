<x-layouts.layout>
    <x-web-navbar />

    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Servicios
                </h1>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="flex flex-col justify-center z-10 p-12 rounded-lg bg-white/50 shadow-md">
                        <h2 class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                            Transporte
                        </h2>
                        <p class="mt-4 text-lg text-gray-500">
                            En Acuña Maquinarias SRL ofrecemos un servicio integral de transporte para maquinaria vial y
                            agrícola, garantizando seguridad, eficiencia y cumplimiento en cada traslado. Contamos con
                            equipos y unidades propias adaptadas a diferentes tipos de maquinaria, junto con un personal
                            capacitado que asegura una logística confiable y sin demoras. Nuestro objetivo es brindar
                            soluciones completas, desde la entrega hasta el retiro, con la tranquilidad y respaldo de
                            una empresa con amplia experiencia en el sector productivo. En Acuña Maquinarias, tu máquina
                            llega a destino con la misma confianza con la que fue entregada.
                        </p>
                    </div>
                    <div id="stacked-images-mobile"
                        class="group md:hidden w-full relative h-96 flex items-center justify-center mt-8">
                        <img src="{{ asset('images/Camion1.jpeg') }}" alt="Transporte de maquinaria"
                            class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform -rotate-6 transition-all duration-500 ease-in-out group-hover:scale-110 group-hover:-translate-x-10 group-hover:-rotate-15 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-1s aspect-square object-cover">
                        <img src="{{ asset('images/Camion2.jpeg') }}" alt="Transporte de maquinaria"
                            class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform rotate-3 translate-x-8 translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-120 group-hover:rotate-5 group-hover:translate-x-4 group-hover:-translate-y-4 group-hover:z-20 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-2s aspect-square object-cover">
                        <img src="{{ asset('images/Camion3.jpeg') }}" alt="Transporte de maquinaria"
                            class="clickable-image cursor-pointer absolute w-2/3 rounded-lg shadow-2xl transform rotate-8 -translate-x-8 -translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-115 group-hover:translate-x-10 group-hover:rotate-10 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-3s aspect-square object-cover">
                    </div>
                    <div id="stacked-images"
                        class="group hidden md:flex md:w-full relative h-96 items-center justify-center">
                        <img src="{{ asset('images/Camion1.jpeg') }}" alt="Transporte de maquinaria"
                            class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform -rotate-6 transition-all duration-500 ease-in-out group-hover:scale-110 group-hover:-translate-x-10 group-hover:-rotate-15 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-1s aspect-square object-cover">
                        <img src="{{ asset('images/Camion2.jpeg') }}" alt="Transporte de maquinaria"
                            class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform rotate-3 translate-x-8 translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-120 group-hover:rotate-5 group-hover:translate-x-4 group-hover:-translate-y-4 group-hover:z-20 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-2s aspect-square object-cover">
                        <img src="{{ asset('images/Camion3.jpeg') }}" alt="Transporte de maquinaria"
                            class="clickable-image cursor-pointer absolute w-2/3 rounded-lg shadow-2xl transform rotate-8 -translate-x-8 -translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-115 group-hover:translate-x-10 group-hover:rotate-10 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-3s aspect-square object-cover">
                    </div>
                </div>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div id="stacked-images-mobile"
                        class="group md:hidden w-full relative h-96 flex items-center justify-center mt-8">
                        <img src="{{ asset('images/cpcd25-2.jpg') }}" alt="Alquiler de autoelevadores"
                            class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform -rotate-6 transition-all duration-500 ease-in-out group-hover:scale-110 group-hover:-translate-x-10 group-hover:-rotate-15 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-1s aspect-square object-cover">
                        <img src="{{ asset('images/cpcd25-4.jpg') }}" alt="Alquiler de autoelevadores"
                            class="clickable-image cursor-pointer absolute w-2/3 rounded-lg shadow-2xl transform rotate-8 -translate-x-8 -translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-115 group-hover:translate-x-10 group-hover:rotate-10 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-2s aspect-square object-cover">
                        <img src="{{ asset('images/cpcd25-3.jpg') }}" alt="Alquiler de autoelevadores"
                            class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform rotate-3 translate-x-8 translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-120 group-hover:rotate-5 group-hover:translate-x-4 group-hover:-translate-y-4 group-hover:z-20 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-3s aspect-square object-cover">
                    </div>
                    <div id="stacked-images"
                        class="group hidden md:flex md:w-full relative h-96 items-center justify-center">
                        <img src="{{ asset('images/cpcd25-2.jpg') }}" alt="Alquiler de autoelevadores"
                            class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform -rotate-6 transition-all duration-500 ease-in-out group-hover:scale-110 group-hover:-translate-x-10 group-hover:-rotate-15 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-1s aspect-square object-cover">
                        <img src="{{ asset('images/cpcd25-4.jpg') }}" alt="Alquiler de autoelevadores"
                            class="clickable-image cursor-pointer absolute w-2/3 rounded-lg shadow-2xl transform rotate-8 -translate-x-8 -translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-115 group-hover:translate-x-10 group-hover:rotate-10 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-2s aspect-square object-cover">
                        <img src="{{ asset('images/cpcd25-3.jpg') }}" alt="Alquiler de autoelevadores"
                            class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform rotate-3 translate-x-8 translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-120 group-hover:rotate-5 group-hover:translate-x-4 group-hover:-translate-y-4 group-hover:z-20 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-3s aspect-square object-cover">
                    </div>
                    <div class="flex flex-col justify-center z-10 p-12 rounded-lg bg-white/50 shadow-md">
                        <h2 class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                            Alquileres de Autoelevadores
                        </h2>
                        <p class="mt-4 text-lg text-gray-500">
                            En Acuña Maquinarias SRL ofrecemos el alquiler de autoelevadores LiuGong, una marca líder a
                            nivel mundial por su durabilidad y rendimiento. Brindamos equipos modernos y listos para
                            trabajar, con asistencia técnica especializada y repuestos originales que garantizan el
                            funcionamiento continuo durante todo el período de alquiler. Nuestro servicio postventa y
                            soporte local aseguran una respuesta rápida ante cualquier necesidad, brindando respaldo,
                            confianza y asesoramiento profesional. En Acuña Maquinarias, alquilar un autoelevador es
                            sumar un aliado confiable para tu negocio.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-web-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const images = document.querySelectorAll('.clickable-image');
            let highestZIndex = 30; // Start above hover z-indexes

            images.forEach(image => {
                image.addEventListener('click', function () {
                    highestZIndex++;
                    this.style.zIndex = highestZIndex;
                });
            });
        });
    </script>
</x-layouts.layout>