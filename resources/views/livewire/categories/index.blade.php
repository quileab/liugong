<?php

use Livewire\Volt\Component;
use App\Models\Category;

new class extends Component {
    public function with(): array
    {
        return [
            'categories' => Category::all()
        ];
    }
}; ?>

<div>
    <x-header title="Categorías" separator>
        <x-slot:actions>
            <x-button label="Agregar Categoría" link="/categories/create" icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>
    <x-card>
        @foreach($categories as $category)
            <x-list-item :item="$category" link="/categories/{{ $category->id }}/edit" />
        @endforeach
    </x-card>
</div>