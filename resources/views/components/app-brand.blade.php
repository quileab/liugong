
<a href="/" wire:navigate>
    <!-- Hidden when collapsed -->
    <div {{ $attributes->class(["hidden-when-collapsed"]) }}>
        <img src="{{ asset('images/SVG/Logo-LiuGong.svg') }}" alt="Logo LiuGong" class="h-10" />
    </div>

    <!-- Display when collapsed -->
    <div class="display-when-collapsed hidden mx-5 mt-5 mb-1 h-[28px]">
        <x-icon name="s-cube" class="w-6 -mb-1.5 text-orange-400" />
    </div>
</a>
