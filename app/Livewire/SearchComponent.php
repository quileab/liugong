<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class SearchComponent extends Component
{
    public string $search = '';
    public ?int $category_id = null;

    public function updatedSearch()
    {
        $this->dispatch('search', $this->search);
    }

    public function updatedCategoryId()
    {
        $this->dispatch('category-updated', $this->category_id);
    }

    public function render()
    {
        return view('livewire.search-component', [
            'categories' => Category::all(),
        ]);
    }
}