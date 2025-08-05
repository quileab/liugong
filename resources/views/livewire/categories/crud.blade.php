<?php

use Livewire\Volt\Component;
use App\Models\Category;
use Livewire\Attributes\Rule;

new class extends Component {
    public Category $category;

    #[Rule('required|string|min:3|max:100')]
    public $name = '';

    public function mount($id = null)
    {
        if ($id) {
            $this->category = Category::findOrFail($id);
            $this->name = $this->category->name;
        } else {
            $this->category = new Category();
        }
    }

    public function save()
    {
        $this->validate();

        Category::updateOrCreate(
            ['id' => $this->category->id],
            ['name' => $this->name]
        );

        return $this->redirect('/categories');
    }

    public function delete()
    {
        if ($this->category->id) {
            $this->category->delete();
        }

        return $this->redirect('/categories');
    }
}; ?>

<div>
    <x-header :title="$category->id ? 'Editar Categoría' : 'Crear Categoría'" separator />
    <x-card>
        <x-form wire:submit.prevent="save">
            <x-input label="Nombre" wire:model="name" />
            <x-slot:actions>
                <x-button label="Cancelar" link="/categories" />
                <x-button label="Guardar" type="submit" icon="o-check" class="btn-primary" />
                @if($category->id)
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