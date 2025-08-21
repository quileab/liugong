<div class="bg-gray-100 py-8 px-4">
    <h2 class="text-3xl font-bold text-center mb-8">Últimas Noticias</h2>
    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
        @foreach($posts as $post)
            <x-web-card :title="$post->title" :image="$post->image_path">
                {{ Str::limit($post->content, 100) }}
            </x-web-card>
        @endforeach
    </div>
</div>
