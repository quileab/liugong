<?php

use Livewire\Volt\Component;
use App\Models\Post;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public function with(): array
    {
        return [
            'posts' => Post::paginate(10),
            'headers' => [
                ['key' => 'id', 'label' => '#'],
                ['key' => 'title', 'label' => 'Título'],
                ['key' => 'published_at', 'label' => 'Fecha de publicación'],
            ]
        ];
    }
}; ?>

<div>
    <x-header title="Noticias" separator>
        <x-slot:actions>
            <x-button label="Agregar" link="/posts/create" icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-table :headers="$headers" :rows="$posts" link="/posts/{id}/edit" with-pagination />
    </x-card>
</div>