<div>
    <div class="bg-[var(--color-primary)] shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">{{ $title }}</h2>
        <p class="text-gray-700">{{ $slot }}</p>
        @if(isset($footer))
            <div class="mt-4">
                {{ $footer }}
            </div>
        @endif
    </div>