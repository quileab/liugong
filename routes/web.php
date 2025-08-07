<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

//Volt::route('/', 'users.index');
Volt::route('/categories', 'categories.index');
Volt::route('/categories/create', 'categories.crud');
Volt::route('/categories/{id}/edit', 'categories.crud');

Volt::route('/products', 'products.index');
Volt::route('/products/create', 'products.crud');
Volt::route('/products/{id}/edit', 'products.crud');

// Ruta que retorna la vista "vista" sin controlador
Route::get('/vista', function () {
  return view('vista');
});

Route::get('/', function () {
    return view('index');
});