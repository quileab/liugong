<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create(['name' => 'Autoelevadores Nafta']);
        \App\Models\Category::create(['name' => 'Autoelevadores Diesel']);
        \App\Models\Category::create(['name' => 'Autoelevadores Gas']);
        \App\Models\Category::create(['name' => 'Autoelevadores Eléctricos']);
        \App\Models\Category::create(['name' => 'Compactadores']);
        \App\Models\Category::create(['name' => 'Camión Minero']);
        \App\Models\Category::create(['name' => 'Excavadoras']);
        \App\Models\Category::create(['name' => 'Fresadora']);
        \App\Models\Category::create(['name' => 'Pavimentadora']);
        \App\Models\Category::create(['name' => 'Grúas sobre camión']);
        \App\Models\Category::create(['name' => 'Minicargadoras']);
        \App\Models\Category::create(['name' => 'Motoniveladoras']);
        \App\Models\Category::create(['name' => 'Palas Cargadoras']);
        \App\Models\Category::create(['name' => 'Plataformas de Elevación']);
        \App\Models\Category::create(['name' => 'Pala y Retro']);
        \App\Models\Category::create(['name' => 'Topadoras LiuGong']);
        \App\Models\Category::create(['name' => 'Topadoras Dressta']);
        \App\Models\Category::create(['name' => 'Zorras']);
    }
}
