<x-layouts.layout>
    <x-web-navbar />

    {{-- carousel start --}}
    @php
        $slides = \App\Models\Carousel::orderBy('order')->get()->map(function ($slide) {
            return [
                'image' => $slide->image_path,
                'title' => $slide->title,
                'description' => $slide->description,
                'url' => $slide->url,
                'urlText' => $slide->url_text,
            ];
        })->toArray();
    @endphp
    <x-carousel :slides="$slides" autoplay class="h-[40vh] lg:h-[80vh]" />

    <div class="bg-gray-100 text-gray-900">
        <main class="container mx-auto px-4 py-8 z-1" >
            <div class="flex flex-col md:flex-row gap-8 items-center">
                <div class="md:w-1/2">
                    <h1 class="text-3xl text-[var(--color-primary)] font-bold text-center mb-4 animate__animated animate__flipInX">Sobre Nosotros</h1>
                    <h2 class="text-xl mb-4 animate__animated animate__fadeInRight">En Acuña Maquinarias SRL, nos dedicamos a la venta, alquiler y servicio de maquinaria agrícola y de construcción, brindando soluciones integrales a nuestros clientes.</h2>
                    <div class="prose lg:prose-xl mx-auto space-y-4 ">
                        <p class="animate__animated animate__fadeInRight animate__delay-1s">Somos una empresa familiar con un fuerte compromiso con el sector productivo. Como concesionario oficial de marcas líderes a nivel mundial como Massey Ferguson, LiuGong y Aolite, ofrecemos una amplia gama de maquinaria de alta calidad y rendimiento.</p>
                        <p class="animate__animated animate__fadeInRight animate__delay-2s">Nuestra actividad principal es la comercialización de maquinaria agrícola y vial, nueva y usada. Además, contamos con un servicio técnico oficial especializado en autoelevadores, garantizando el mantenimiento y la reparación de sus equipos con los más altos estándares.</p>
                        <p class="animate__animated animate__fadeInRight animate__delay-3s">En Acuña Maquinarias SRL, no solo vendemos máquinas, sino que construimos relaciones a largo plazo con nuestros clientes, basadas en la confianza, el asesoramiento profesional y un servicio postventa de excelencia. Nuestro objetivo es ser su socio estratégico, acompañándolo en el crecimiento de su negocio y ofreciéndole las mejores herramientas para optimizar su trabajo.</p>
                    </div>
                </div>
                <div id="stacked-images" class="group md:w-1/2 lg:w-2/5 relative h-96 flex items-center justify-center">
                    <img src="{{ asset('images/liugong-local.jpg') }}" alt="Local de Acuña Maquinarias 1" class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform -rotate-6 transition-all duration-500 ease-in-out group-hover:scale-110 group-hover:-translate-x-10 group-hover:-rotate-15 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-1s aspect-square object-cover">
                    <img src="{{ asset('images/liugong-local1.jpg') }}" alt="Local de Acuña Maquinarias 2" class="clickable-image cursor-pointer absolute w-3/4 rounded-lg shadow-2xl transform rotate-3 translate-x-8 translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-120 group-hover:rotate-5 group-hover:translate-x-4 group-hover:-translate-y-4 group-hover:z-20 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-2s aspect-square object-cover">
                    <img src="{{ asset('images/liugong-local2.jpg') }}" alt="Local de Acuña Maquinarias 3" class="clickable-image cursor-pointer absolute w-2/3 rounded-lg shadow-2xl transform rotate-8 -translate-x-8 -translate-y-8 transition-all duration-500 ease-in-out group-hover:scale-115 group-hover:translate-x-10 group-hover:rotate-10 group-hover:z-10 group-hover:[box-shadow:0_0_10px_rgba(0,0,0,0.6)] animate__animated animate__fadeInRight animate__delay-3s aspect-square object-cover">
                </div>
            </div>
        </main>
        
        <livewire:post-list />
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