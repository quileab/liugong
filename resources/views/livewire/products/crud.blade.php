<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Category;
use Mary\Traits\Toast;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use Toast;
    use WithFileUploads;

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
    public $image; // This will store the path to the image

    #[Rule('nullable|image|max:1024')]
    public $photo; // This will store the uploaded file

    #[Rule('nullable|string')]
    public $specs;

    #[Rule('required|integer|min:0')]
    public $stock_quantity;

    #[Rule('required|boolean')]
    public $visible = true;

    #[Rule('required|boolean')]
    public $featured = false;

    #[Rule('required|boolean')]
    public $new = true;

    public function mount($id = null): void
    {
        if ($id) {
            $this->product = Product::findOrFail($id);
            $this->fill($this->product);
        } else {
            $this->product = new Product();
            $this->category_id = null;
        }
    }

    public function save(): void
    {
        $data = $this->validate();

        if ($this->photo) {
            $data['image'] = $this->photo->store('products', 'public');
        } else if ($this->product->exists && $this->product->image) {
            // If no new photo is uploaded, but an image already exists for the product,
            // ensure it's included in the data to be saved.
            $data['image'] = $this->product->image;
        }

        Product::updateOrCreate(['id' => $this->product->id], $data);

        $this->toast(type: 'success', title: 'Producto guardado exitosamente!');
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
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <x-toggle label="Visible" wire:model="visible" />
                <x-toggle label="Destacado" wire:model="featured" />
                <x-toggle label="Nuevo" wire:model="new" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="col-span-2">
                    <x-file label="Imagen del Producto" wire:model="photo" accept="image/*">
                        <img src="{{ $image ? asset('app-files/' . $image) : asset('images/placeholder.jpg') }}"
                            class="h-40 rounded-lg" />
                    </x-file>
                </div>

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