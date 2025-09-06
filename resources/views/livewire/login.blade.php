<?php
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new #[Layout('components.layouts.empty')]
    #[Title('Iniciar Sesión')]
    class extends Component {

    public string $email = '';
    public string $password = '';

    public function mount()
    {
        // It is logged in
        if (auth()->user()) {
            return redirect(route('dashboard')); // Redirect to dashboard if already logged in
        }
    }

    public function login()
    {
        $credentials = $this->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]
        );
        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended(route('dashboard')); // Redirect to dashboard after successful login
        }
        $this->addError('email', 'Login incorrecto. Intentelo de nuevo.'); // Re-add error for failed login
    }

}; ?>

<div class="min-h-screen flex justify-center items-center">
    <div data-theme="dark"
        class="w-3/4 md:w-1/3 mx-auto bg-slate-900/80 backdrop-blur-xl rounded-lg shadow-lg shadow-black/50 p-4">
        <x-header title="INGRESAR" />
        <x-form wire:submit="login" no-separator>
            <x-input label="E-mail" wire:model="email" icon="o-envelope" inline />
            <x-input label="Password" wire:model="password" type="password" icon="o-lock-closed" inline />

            <x-slot:actions>
                <div class="flex justify-between w-full">
                    <x-button label="Volver" @click="window.history.back()" icon="o-arrow-uturn-left"
                        class="btn-neutral" />
                    <x-button label="INGRESAR" type="submit" icon="o-key" class="btn-primary" spinner="login" />
                </div>
            </x-slot:actions>
        </x-form>
    </div>
</div>