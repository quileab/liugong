<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Category;
use Mary\Traits\Toast;
use Livewire\Attributes\Rule;

new class extends Component {
    use Toast;

    public Product $product;

    #[Rule('required|exists:categories,id')]
    public $category_id;

    #[Rule('required|string|min:3|max:100')]
    public $name = '';

    #[Rule('required|numeric|min:0')]
    public $price;

    #[Rule('nullable|string')]
    public $description;

    #[Rule('nullable|string')]
    public $image;

    #[Rule('nullable|string')]
    public $specs;

    #[Rule('required|integer|min:0')]
    public $stock_quantity;

    public function mount($id = null): void
    {
        if ($id) {
            $this->product = Product::findOrFail($id);
            $this->fill($this->product);
        } else {
            $this->product = new Product();
        }
    }

    public function save(): void
    {
        $data = $this->validate();

        Product::updateOrCreate(['id' => $this->product->id], $data);

        $this->toast(type: 'success', title: 'Product saved successfully!');
        $this->redirect('/products', navigate: true);
    }

    public function delete(): void
    {
        if ($this->product->id) {
            $this->product->delete();
            $this->toast(type: 'success', title: 'Product deleted successfully!');
            $this->redirect('/products', navigate: true);
        }
    }

    public function with(): array
    {
        return [
            'categories' => Category::all()
        ];
    }
}; ?>

<div>
    <x-header :title="$product->id ? 'Editar Producto' : 'Crear Producto'" separator />

    <x-card>
        <x-form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-select label="Categoría" :options="$categories" wire:model="category_id"
                    placeholder="Selecciona una categoría" />
                <x-input label="Nombre" wire:model="name" />
                <x-input label="Precio" wire:model="price" type="number" step="0.01" />
                <x-input label="Cantidad en Stock" wire:model="stock_quantity" type="number" />
                <x-input label="Imagen" wire:model="image" />
                <x-textarea label="Descripción" wire:model="description" rows="5" class="col-span-2" />
                <x-textarea label="Especificaciones" wire:model="specs" rows="5" class="col-span-2" />
            </div>
            <x-slot:actions>
                <x-button label="Cancelar" link="/products" />
                <x-button label="Guardar" type="submit" icon="o-check" class="btn-primary" />
                @if($product->id)
                    <x-dropdown>
                        <x-slot:trigger>
                            <x-button label="Eliminar" icon="o-trash" class="btn-error" />
                        </x-slot:trigger>
                        <x-menu-item title="Confirmar" wire:click="delete" />
                    </x-dropdown>
                @endif
            </x-slot:actions>
        </x-form>
    </x-card>
</div>