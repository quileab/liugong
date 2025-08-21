<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Post 1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'image_path' => 'https://via.placeholder.com/640x480.png/00ff77?text=Post+1',
            'published_at' => now(),
        ]);

        Post::create([
            'title' => 'Post 2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'image_path' => 'https://via.placeholder.com/640x480.png/0077ff?text=Post+2',
            'published_at' => now(),
        ]);

        Post::create([
            'title' => 'Post 3',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'image_path' => 'https://via.placeholder.com/640x480.png/ff0077?text=Post+3',
            'published_at' => now(),
        ]);
    }
}
