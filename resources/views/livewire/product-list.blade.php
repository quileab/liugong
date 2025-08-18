<div class="bg-gray-100 py-8 px-4 grid grid-cols-1 gap-12 md:grid-cols-3">
    @foreach($products as $product)
        <a href="{{ route('product.detail', $product) }}">
            <x-web-card :title="$product->name" :image="$product->image">
                {{ $product->description }}
            </x-web-card>
        </a>
    @endforeach
</div>