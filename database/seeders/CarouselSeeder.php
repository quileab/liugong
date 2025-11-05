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
        Carousel::firstOrCreate(
            ['title' => 'Frontend developers'],
            [
                'image_path' => 'images/placeholder.jpg',
                'description' => 'We love last week frameworks.',
                'url' => '/docs/installation',
                'url_text' => 'Get started',
                'order' => 1,
            ]
        );

        Carousel::firstOrCreate(
            ['title' => 'Full stack developers'],
            [
                'image_path' => 'images/placeholder.jpg',
                'description' => 'Where burnout is just a fancy term for Tuesday.',
                'order' => 2,
            ]
        );

        Carousel::firstOrCreate(
            ['order' => 3],
            [
                'image_path' => 'images/placeholder.jpg',
                'url' => '/docs/installation',
                'url_text' => 'Let`s go!',
            ]
        );

        Carousel::firstOrCreate(
            ['order' => 4],
            [
                'image_path' => 'images/placeholder.jpg',
                'url' => '/docs/installation',
            ]
        );
    }
}
