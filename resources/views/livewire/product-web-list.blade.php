<div>
    <x-web-navbar />
    <div class="bg-gray-100 py-8 px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-primary">Nuestros Productos</h2>
        <livewire:search-component />
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse($products as $product)
                <a href="{{ route('product.detail', $product) }}" class="block">
                    <x-web-card :title="$product->name" :image="$product->image">
                        {{ Str::limit($product->description, 100) }}
                    </x-web-card>
                </a>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    <p>No hay productos para mostrar en este momento.</p>
                </div>
            @endforelse
        </div>
    </div>
    <x-web-footer />
</div>
