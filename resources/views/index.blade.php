<x-layouts.layout>
    <x-web-navbar />
{{-- carousel start --}}
@php
    $slides = [
        [
            'image' => '/photos/photo-1559703248-dcaaec9fab78.jpg',
            'title' => 'Frontend developers',
            'description' => 'We love last week frameworks.',
            'url' => '/docs/installation',
            'urlText' => 'Get started',
        ],
        [
            'image' => '/photos/photo-1565098772267-60af42b81ef2.jpg',
            'title' => 'Full stack developers',
            'description' => 'Where burnout is just a fancy term for Tuesday.',
        ],
        [
            'image' => '/photos/photo-1494253109108-2e30c049369b.jpg',
            'url' => '/docs/installation',
            'urlText' => 'Let`s go!',
        ],
        [
            'image' => '/photos/photo-1572635148818-ef6fd45eb394.jpg',
            'url' => '/docs/installation',
        ],
    ];
@endphp
 
<x-carousel :slides="$slides" />

{{-- carousel end --}}
    <main>
        <div class="bg-gray-100 py-8 px-4 grid grid-cols-1 gap-12 md:grid-cols-3">
        @foreach($products as $product)
            <x-web-card :title="$product->name">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto aspect-video object-contain">
                {{ $product->description }}
            </x-web-card>
        @endforeach
        </div>
    </main>
   <x-web-footer />
</x-layouts.layout>