<?php

namespace App\Livewire\Auth\Passwords;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Confirm extends Component
{
    public string $password = '';

    public function confirm()
    {
        $this->validate([
            'password' => ['required', 'password'],
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('livewire.auth.passwords.confirm')->extends('layouts.app');
    }
}