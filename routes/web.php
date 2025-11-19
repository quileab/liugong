<?php

use Livewire\Volt\Volt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClearCacheController;

//Volt::route('/', 'users.index');
//Volt::route('/login', 'login')->name('login');

Route::get('/clear/{option?}', ClearCacheController::class);

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
require __DIR__ . '/auth.php';
Route::middleware('auth')->group(function () {
    Volt::route('/dashboard', 'dashboard')->name('dashboard');
    Volt::route('/profile', 'profile')->name('profile');
    Volt::route('/categories', 'categories.index');
    Volt::route('/categories/create', 'categories.crud');
    Volt::route('/categories/{id}/edit', 'categories.crud');

    Volt::route('/products', 'products.index');
    Volt::route('/products/create', 'products.crud');
    Volt::route('/products/{id}/edit', 'products.crud');

    Volt::route('/posts', 'posts.index');
    Volt::route('/posts/create', 'posts.crud');
    Volt::route('/posts/{id}/edit', 'posts.crud');

    Route::get('/carousel', \App\Livewire\CarouselManager::class)->name('carousel.manager');
    Route::get('/contacts', \App\Livewire\ContactManager::class)->name('contacts.manager');

    // User CRUD routes
    Volt::route('/users/create', 'user-form')->name('users.create');
    Volt::route('/users/{user}/edit', 'user-form')->name('users.edit');
    Volt::route('/users', 'user-list')->name('users.index');
});
// Ruta que retorna la vista "vista" sin controlador
Route::get('/vista', function () {
    return view('vista');
});

Route::get('/', function () {
    $newFeatured = \App\Models\Product::whereNotNull('visible')->where('featured', true)->where('new', true)->get();
    $usedFeatured = \App\Models\Product::whereNotNull('visible')->where('featured', true)->where('new', false)->get();
    return view('index', compact('newFeatured', 'usedFeatured'));
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/products/type/{type}', function ($type) {
    session(['product_type' => $type]);
    return redirect()->route('products.web');
})->name('products.set_type');

Route::get('/products-web', \App\Livewire\ProductWebList::class)->name('products.web');


Route::get('/product/{product}', \App\Livewire\ProductDetail::class)->name('product.detail');
Route::get('/post/{post}', \App\Livewire\PostDetail::class)->name('post.detail');

Route::get('/create-storage-link', function () {
    $targetFolder = storage_path('app/public');
    $linkFolder = public_path('storage');
    if (file_exists($linkFolder)) {
        return 'The "public/storage" directory already exists.';
    }
    try {
        symlink($targetFolder, $linkFolder);
        return 'The [public/storage] directory has been linked.';
    } catch (\Exception $e) {
        return 'Error creating symlink: ' . $e->getMessage();
    }
});
