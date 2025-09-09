<div class="bg-gray-100 py-8 px-4 z-50">
    <h2 class="text-3xl font-bold text-center mb-8 text-[var(--color-primary)]">Últimas Noticias</h2>
    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
        @foreach($posts as $post)
            <a href="{{ route('post.detail', $post) }}" class="block">
                <x-post-card :title="$post->title" :image="$post->image_path">
                    {{ $post->content }}
                </x-post-card>
            </a>
        @endforeach
    </div>
</div>
