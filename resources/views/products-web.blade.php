<x-layouts.layout>
    <x-web-navbar />
    
    {{-- carousel start --}}
@php
    $slides = [
        [
            'image' => 'https://www.liugong.com/wp-content/uploads/2023/04/0222pc-update.jpg',
            'title' => 'Frontend developers',
            'description' => 'We love last week frameworks.',
            'url' => '/docs/installation',
            'urlText' => 'Get started',
        ],
        [
            'image' => 'https://www.liugong.com/wp-content/uploads/2023/04/banner-0930-PC.jpg',
            'title' => 'Full stack developers',
            'description' => 'Where burnout is just a fancy term for Tuesday.',
        ],
        [
            'image' => 'https://www.liugong.com/wp-content/uploads/2025/03/bauma-pc.jpg',
            'url' => '/docs/installation',
            'urlText' => 'Let`s go!',
        ],
        [
            'image' => 'https://www.liugong.com/wp-content/uploads/2023/09/856e-banner-pc.jpg',
            'url' => '/docs/installation',
        ],
    ];
@endphp
 
<x-carousel :slides="$slides" autoplay />
<livewire:search-component />
<h1 class="text-2xl font-bold text-center">Nuestros Productos</h1>

{{-- carousel end --}}
    <main>
        <livewire:product-list />
    </main>

   <x-web-footer />
</x-layouts.layout>