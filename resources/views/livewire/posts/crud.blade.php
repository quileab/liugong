<?php

use Livewire\Volt\Component;
use App\Models\Post;
use Mary\Traits\Toast;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use Toast;
    use WithFileUploads;

    public Post $post;

    #[Rule('required|string|min:3|max:100')]
    public $title = '';

    #[Rule('required|string')]
    public $content;

    #[Rule('nullable|string')]
    public $image_path;

    #[Rule('nullable|image|max:1024')]
    public $photo;

    #[Rule('nullable|date')]
    public $published_at;

    public function mount($id = null): void
    {
        if ($id) {
            $this->post = Post::findOrFail($id);
            $this->fill($this->post);
        } else {
            $this->post = new Post();
        }
    }

    public function save(): void
    {
        $data = $this->validate();

        if ($this->photo) {
            $data['image_path'] = $this->photo->store('posts', 'public');
        } else if ($this->post->exists && $this->post->image_path) {
            $data['image_path'] = $this->post->image_path;
        }
        
        unset($data['photo']);

        Post::updateOrCreate(['id' => $this->post->id], $data);

        $this->toast(type: 'success', title: 'Post saved successfully!');
        $this->redirect('/posts', navigate: true);
    }

    public function delete(): void
    {
        if ($this->post->id) {
            $this->post->delete();
            $this->toast(type: 'success', title: 'Post deleted successfully!');
            $this->redirect('/posts', navigate: true);
        }
    }
}; ?>

<div>
    <x-header :title="$post->id ? 'Edit Post' : 'Create Post'" separator />

    <x-card>
        <x-form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-input label="Title" wire:model="title" />
                <x-input type="date" label="Published At" wire:model="published_at" />

                <div class="col-span-2">
                    <x-file label="Image" wire:model="photo" accept="image/*">
                        <img src="{{ $image_path ? (Str::startsWith($image_path, 'http') ? $image_path : asset('storage/' . $image_path)) : asset('images/placeholder.jpg') }}" class="h-40 rounded-lg" />
                    </x-file>
                </div>

                <x-textarea label="Content" wire:model="content" rows="5" class="col-span-2" />
            </div>
            <x-slot:actions>
                <x-button label="Cancel" link="/posts" />
                <x-button label="Save" type="submit" icon="o-check" class="btn-primary" />
                @if($post->id)
                    <x-dropdown>
                        <x-slot:trigger>
                            <x-button label="Delete" icon="o-trash" class="btn-error" />
                        </x-slot:trigger>
                        <x-menu-item title="Confirm" wire:click="delete" />
                    </x-dropdown>
                @endif
            </x-slot:actions>
        </x-form>
    </x-card>
</div>