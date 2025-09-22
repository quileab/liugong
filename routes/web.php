<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//Volt::route('/', 'users.index');
//Volt::route('/login', 'login')->name('login');

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

Route::get('/clear/{option?}', function ($option = null) {
    $logs = [];
    // if option is 'prod' then run composer install --optimize-autoloader --no-dev
    if ($option == 'prod') {
        $logs['Composer Install for PROD'] = Artisan::call('composer install --optimize-autoloader --no-dev');
    }

    $maintenance = ($option == "cache") ? [
        'Flush' => 'cache:flush',
    ] : [
        //'DebugBar'=>'debugbar:clear',
        'Storage Link' => 'storage:link',
        'Config' => 'config:clear',
        'Optimize Clear' => 'optimize:clear',
        'Optimize' => 'optimize',
        'Route Clear' => 'route:clear',
        'Route Cache' => 'route:cache',
        'View Clear' => 'view:clear',
        'View Cache' => 'view:cache',
        'Cache Clear' => 'cache:clear',
        'Cache Config' => 'config:cache',
    ];

    foreach ($maintenance as $key => $value) {
        try {
            Artisan::call($value);
            $logs[$key] = '✔️';
        } catch (\Exception $e) {
            $logs[$key] = '❌' . $e->getMessage();
        }
    }
    return "<pre>" . print_r($logs, true) . "</pre><hr />";
});