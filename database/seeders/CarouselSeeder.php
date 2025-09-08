<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carousel::create([
            'image_path' => 'images/placeholder.jpg',
            'title' => 'Frontend developers',
            'description' => 'We love last week frameworks.',
            'url' => '/docs/installation',
            'url_text' => 'Get started',
            'order' => 1,
        ]);

        Carousel::create([
            'image_path' => 'images/placeholder.jpg',
            'title' => 'Full stack developers',
            'description' => 'Where burnout is just a fancy term for Tuesday.',
            'order' => 2,
        ]);

        Carousel::create([
            'image_path' => 'images/placeholder.jpg',
            'url' => '/docs/installation',
            'url_text' => 'Let`s go!',
            'order' => 3,
        ]);

        Carousel::create([
            'image_path' => 'images/placeholder.jpg',
            'url' => '/docs/installation',
            'order' => 4,
        ]);
    }
}
