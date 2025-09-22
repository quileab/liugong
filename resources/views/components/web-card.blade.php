@props(['title', 'image', 'footer', 'titleClass', 'contentClass'])

<div class="inno-card p-0 overflow-hidden flex flex-col">
    <h2 class="text-2xl font-bold mb-4 p-4 {{ $titleClass ?? 'text-primary' }}">{{ $title }}</h2>
    @if(isset($image))
        <img src="{{ Str::startsWith($image, 'http') ? $image : asset('storage/' . $image) }}" alt="{{ $title }}" class="w-full h-auto flex-1 aspect-video object-contain">
    @endif
        <p class="text-lg md:text-sm h-32 p-6 {{ $contentClass ?? 'text-white bg-secondary' }}">{{ $slot }}</p>
    @if(isset($footer))
        <div class="mt-4">
            {{ $footer }}
        </div>
    @endif
</div>