<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('login', 'login')->name('login');
    Volt::route('register', 'register')->name('register');
});

Volt::route('password/reset', 'passwords.email')->name('password.request');
Volt::route('password/reset/{token}', 'passwords.reset')->name('password.reset');

Route::middleware('auth')->group(function () {
    Volt::route('email/verify', 'verify')->name('verification.notice');
    Volt::route('password/confirm', 'passwords.confirm')->name('password.confirm');
});