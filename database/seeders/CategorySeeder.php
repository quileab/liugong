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
        \App\Models\Category::firstOrCreate(['name' => 'Autoelevadores Nafta']);
        \App\Models\Category::firstOrCreate(['name' => 'Autoelevadores Diesel']);
        \App\Models\Category::firstOrCreate(['name' => 'Autoelevadores Gas']);
        \App\Models\Category::firstOrCreate(['name' => 'Autoelevadores Eléctricos']);
        \App\Models\Category::firstOrCreate(['name' => 'Compactadores']);
        \App\Models\Category::firstOrCreate(['name' => 'Camión Minero']);
        \App\Models\Category::firstOrCreate(['name' => 'Excavadoras']);
        \App\Models\Category::firstOrCreate(['name' => 'Fresadora']);
        \App\Models\Category::firstOrCreate(['name' => 'Pavimentadora']);
        \App\Models\Category::firstOrCreate(['name' => 'Grúas sobre camión']);
        \App\Models\Category::firstOrCreate(['name' => 'Minicargadoras']);
        \App\Models\Category::firstOrCreate(['name' => 'Motoniveladoras']);
        \App\Models\Category::firstOrCreate(['name' => 'Palas Cargadoras']);
        \App\Models\Category::firstOrCreate(['name' => 'Plataformas de Elevación']);
        \App\Models\Category::firstOrCreate(['name' => 'Pala y Retro']);
        \App\Models\Category::firstOrCreate(['name' => 'Topadoras LiuGong']);
        \App\Models\Category::firstOrCreate(['name' => 'Topadoras Dressta']);
        \App\Models\Category::firstOrCreate(['name' => 'Zorras']);
    }
}
