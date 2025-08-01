<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'users.index');
// Ruta que retorna la vista "vista" sin controlador
Route::get('/vista', function () {
  return view('vista');
});
