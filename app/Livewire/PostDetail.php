<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;
    public ?Post $previousPost;
    public ?Post $nextPost;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->previousPost = Post::where('id', '<', $this->post->id)->orderBy('id', 'desc')->first();
        $this->nextPost = Post::where('id', '>', $this->post->id)->orderBy('id', 'asc')->first();
    }

    public function render()
    {
        return view('livewire.post-detail')
            ->layout('components.layouts.layout');
    }
}
