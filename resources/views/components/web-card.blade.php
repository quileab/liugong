@props(['title', 'image', 'footer', 'titleClass', 'contentClass', 'used' => false])

<div class="inno-card p-0 overflow-hidden flex flex-col relative">
    @if($used)
        <div class="absolute top-0 right-0 w-24 h-24 overflow-hidden">
            <span class="absolute transform rotate-45 bg-blue-900 text-white text-xs font-semibold text-center z-10 py-1 -right-7 top-6 w-32">USADO</span>
        </div>
    @endif
    <h2 class="text-2xl font-bold mb-4 p-4 {{ $titleClass ?? 'text-primary' }}">{{ $title }}</h2>
    @if(isset($image))
        <img src="{{ Str::startsWith($image, 'http') ? $image : asset('app-files/' . $image) }}" alt="{{ $title }}" class="w-full h-auto flex-1 aspect-video object-contain">
    @endif
        <p class="text-lg md:text-sm h-32 p-6 {{ $contentClass ?? 'text-white bg-secondary' }}">{{ $slot }}</p>
    @if(isset($footer))
        <div class="mt-4">
            {{ $footer }}
        </div>
    @endif
</div>