<div class="post-card-glass rounded-lg overflow-hidden shadow-lg flex flex-col h-full">
    @if($image)
        <img src="{{ Str::startsWith($image, 'http') ? $image : asset('storage/' . $image) }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    @else
        <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
            <span class="text-gray-400">No Image</span>
        </div>
    @endif
    <div class="p-6 flex flex-col flex-grow">
        <h2 class="text-2xl font-bold mb-4" style="color: var(--color-secondary);">{{ $title }}</h2>
                <p class="text-gray-700 flex-grow line-clamp-4">
            @if(trim($slot) !== '')
                {{ $slot }}
            @else
                <span class="text-red-500">[No content provided for this post]</span>
            @endif
        </p>
    </div>
</div>
