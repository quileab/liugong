<div class="inno-card p-4">
    <h2 class="text-xl font-semibold mb-4 text-primary">{{ $title }}</h2>
    <p class="text-secondary font-bold">{{ $slot }}</p>
    @if(isset($footer))
        <div class="mt-4">
            {{ $footer }}
        </div>
    @endif
</div>