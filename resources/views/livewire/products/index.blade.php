<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public function with(): array
    {
        return [
            'products' => Product::with('category')->paginate(10),
            'headers' => [
                ['key' => 'id', 'label' => '#'],
                ['key' => 'name', 'label' => 'Nombre'],
                ['key' => 'category.name', 'label' => 'Categoría'],
                ['key' => 'price', 'label' => 'Precio'],
                ['key' => 'stock_quantity', 'label' => 'Stock'],
            ]
        ];
    }
}; ?>

<div>
    <x-header title="Productos" separator>
        <x-slot:actions>
            <x-button label="AGREGAR" link="/products/create" icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-table :headers="$headers" :rows="$products" link="/products/{id}/edit" with-pagination />
    </x-card>
</div>
