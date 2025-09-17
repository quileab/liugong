<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductWebList extends Component
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
        $productType = session('product_type', 1); // Default to new products

        $products = Product::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->category_id, function ($query) {
                $query->where('category_id', $this->category_id);
            })
            ->where('new', $productType)
            ->get();

        return view('livewire.product-web-list', [
            'products' => $products,
        ])->layout('components.layouts.layout');
    }
}
