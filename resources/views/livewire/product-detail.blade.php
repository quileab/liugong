<div >
    <x-web-navbar />

{{-- carousel end --}}
    <main data-theme="light">
        <div class="container mx-auto px-4 py-8" >
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                @if(isset($product->image))
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="w-full h-auto rounded-lg shadow-md">
                @endif
                </div>
                <div>
                    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                    @if($product->price > 0)
                    <div class="text-2xl text-gray-800 font-semibold mb-4">
                        ${{ number_format($product->price, 2) }}
                    </div>
                    @endif
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold mb-2">Descripción</h2>
                        <p class="text-gray-600">{{ $product->description ?? 'No hay descripción disponible.' }}</p>
                    </div>
                <div class="mb-4">
                    <h2 class="text-xl font-semibold mb-2">Especificaciones</h2>
                    <pre class="text-gray-600">{{ $product->specs ?? 'No hay especificaciones disponibles.' }}</pre>
                </div>

                <div class="mb-4">
                    <!-- si stock = 0 "Consultar" -->
                    @if($product->stock_quantity > 0)
                        <span class="text-gray-700">Stock: {{ $product->stock_quantity }}</span>
                    @else
                        <span class="text-gray-700">Stock: Consultar</span>
                    @endif
                </div>
                <div class="mb-4">
                    <span class="text-gray-700">Categoría: {{ $product->category->name ?? 'Sin categoría' }}</span>
                </div>
            </div>
        </div>
    </div>
    </main>
    <x-web-footer />
</div>
