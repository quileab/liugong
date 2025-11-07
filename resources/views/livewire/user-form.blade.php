<?php

use App\Models\User;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

new class extends Component {
    public User $user;

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(User $user)
    {
        $this->user = $user;

        if ($this->user->exists) {
            $this->name = $this->user->name;
            $this->email = $this->user->email;
        }
    }

    public function save()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . ($this->user->id ?? 'NULL') . ',id',
        ];

        if (!$this->user->exists || !empty($this->password)) {
            $rules['password'] = ['required', 'confirmed', Password::defaults()];
        }

        $validated = $this->validate($rules);

        if ($this->user->exists) {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

            if (!empty($this->password)) {
                $this->user->update([
                    'password' => Hash::make($this->password),
                ]);
            }

            $this->dispatch('user-updated');
            $this->redirect(route('users.index'));
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $this->dispatch('user-created');
            $this->redirect(route('users.index'));
        }
    }

    public function delete()
    {
        $this->user->delete();
        $this->dispatch('user-deleted');
        $this->redirect(route('users.index'));
    }
}; ?>

<div>
    <x-header :title="$user->exists ? 'Editar Usuario' : 'Registrar Nuevo Usuario'" />

    <x-form wire:submit.prevent="save">
        <x-input label="Nombre" wire:model="name" />
        <x-input label="Email" wire:model="email" type="email" />

        <x-input label="Contraseña" wire:model="password" type="password" />
        <x-input label="Confirmar Contraseña" wire:model="password_confirmation" type="password" />

        <x-slot:actions>
            <div class="flex justify-between w-full">
                <div>
                    @if($user->exists)
                        <x-dropdown>
                            <x-slot:trigger>
                                <x-button label="Acciones" icon="o-chevron-down" class="btn-outline" />
                            </x-slot:trigger>
                            <x-menu-item title="Eliminar" icon="o-trash" wire:click="delete" wire:confirm="¿Estás seguro de que quieres eliminar este usuario?" class="text-red-500" />
                        </x-dropdown>
                    @endif
                </div>
                <div class="flex gap-2">
                    <x-button label="Cancelar" link="{{ route('users.index') }}" />
                    <x-button label="{{ $user->exists ? 'Actualizar' : 'Crear' }}" type="submit" class="btn-primary" />
                </div>
            </div>
        </x-slot:actions>
    </x-form>
</div>
