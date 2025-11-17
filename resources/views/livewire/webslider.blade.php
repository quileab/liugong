<?php

use Livewire\Volt\Component;
use App\Models\Carousel;

new class extends Component {
    public function with(): array
    {
        return [
            'images' => Carousel::orderBy('order')->get(),
        ];
    }
}; ?>

<div>
    <div id="slider-container">
        <div id='slider'>
            @foreach($images as $image)
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}" loading="lazy" />
            @endforeach
        </div>
    </div>
</div>

