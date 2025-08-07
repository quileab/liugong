<div class="inno-card p-0 overflow-hidden flex flex-col">
    <h2 class="text-2xl font-bold mb-4 text-primary p-4">{{ $title }}</h2>
    @if(isset($image))
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-auto flex-1 aspect-video object-contain">
    @endif
        <p class="text-lg md:text-sm text-white bg-secondary p-6 h-32 ">{{ $slot }}</p>
    @if(isset($footer))
        <div class="mt-4">
            {{ $footer }}
        </div>
    @endif
</div>