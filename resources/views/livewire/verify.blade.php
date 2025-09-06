<?php

use function Livewire\Volt\{layout, title};
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component; // Not needed in Volt component's PHP block

layout('layouts.app'); // Use the layout specified in the original render method

new class extends Component
{
    public function resend()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        Auth::user()->sendEmailVerificationNotification();

        session()->flash('resent');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
};

?>

<x-slot name="title">
    {{ __('Verify Your Email Address') }}
</x-slot>

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-app-brand class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{ __('Verify your email address') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            @if (session('resent'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <div class="text-sm text-gray-700">
                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p class="mt-3">
                    {{ __('If you did not receive the email,') }}
                    <a wire:click="resend" class="text-indigo-700 underline cursor-pointer hover:text-indigo-600 focus:outline-none focus:underline transition ease-in-out duration-150">
                        {{ __('click here to request another') }}
                    </a>.
                </p>
            </div>
        </div>
    </div>
</div>