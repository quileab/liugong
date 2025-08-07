<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductList extends Component
{
    public string $search = '';
    public ?int $category_id = null;

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[On('category-updated')]
    public function updateCategory($categoryId)
    {
        $this->category_id = $categoryId;
    }

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        return view('livewire.product-list', [
            'products' => $query->get(),
        ]);
    }
}