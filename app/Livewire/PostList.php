<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    public function render()
    {
        return view('livewire.post-list', [
            'posts' => Post::whereNotNull('published_at')->latest()->take(6)->get(),
        ]);
    }
}
