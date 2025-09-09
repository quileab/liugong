<div>
    <x-web-navbar />
    <div class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl font-bold text-primary mb-4">{{ $post->title }}</h1>
                
                @if($post->image_path)
                    <img src="{{ Str::startsWith($post->image_path, 'http') ? $post->image_path : asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg shadow-lg mb-6">
                @endif
        
                <div class="prose max-w-none text-lg text-gray-700">
                    {!! $post->content !!}
                </div>
        
                <div class="flex justify-between items-center mt-8">
                    @if($previousPost)
                        <a href="{{ route('post.detail', $previousPost) }}" class="inline-block bg-secondary text-white font-bold py-2 px-4 rounded hover:bg-opacity-90 transition-colors">
                            &larr; Post Anterior
                        </a>
                    @else
                        <div></div> <!-- Placeholder to keep alignment -->
                    @endif

                    <a href="{{ route('home') }}" class="inline-block bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-opacity-90 transition-colors">
                        Volver a la Lista
                    </a>

                    @if($nextPost)
                        <a href="{{ route('post.detail', $nextPost) }}" class="inline-block bg-secondary text-white font-bold py-2 px-4 rounded hover:bg-opacity-90 transition-colors">
                            Siguiente Post &rarr;
                        </a>
                    @else
                        <div></div> <!-- Placeholder to keep alignment -->
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-web-footer />
</div>
