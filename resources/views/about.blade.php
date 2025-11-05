<x-layouts.layout>
    <x-web-navbar />
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Sobre Nosotros
                </h1>
            </div>
            <div class="mt-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex flex-col justify-center">
                        <p class="mt-4 text-lg text-gray-500">
                            Acuña Maquinarias SRL, una empresa familiar con más de 40 años de trayectoria, se ha consolidado como un referente en la venta de maquinaria agrícola y vial en el mercado. Representantes oficiales de LiuGong, una de las marcas líderes a nivel mundial en maquinaria de construcción, nos enorgullece ofrecer productos de alta calidad y rendimiento, respaldados por un servicio de postventa y repuestos que garantizan la continuidad operativa de nuestros clientes.
                        </p>
                        <p class="mt-4 text-lg text-gray-500">
                            Nuestra misión es impulsar el crecimiento de nuestros clientes, brindando soluciones a medida que optimicen su productividad y rentabilidad. Nos distingue un trato cercano y personalizado, donde cada cliente es parte de nuestra familia. Lo invitamos a conocernos y descubrir por qué Acuña Maquinarias es sinónimo de confianza y respaldo en el sector.
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <img class="rounded-lg" src="{{ asset('images/liugong-local.jpg') }}" alt="Nuestras instalaciones">
                        <img class="rounded-lg" src="{{ asset('images/liugong-local1.jpg') }}" alt="Nuestras instalaciones">
                        <img class="rounded-lg col-span-2" src="{{ asset('images/liugong-local2.jpg') }}" alt="Nuestras instalaciones">
                    </div>
                </div>
            </div>
        </div>
    </div>
   <x-web-footer />
</x-layouts.layout>