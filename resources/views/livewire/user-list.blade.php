<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component {
    // Fetch all users
    public function with(): array
    {
        return [
            'users' => User::all(),
        ];
    }

    // Define headers for the table
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'name', 'label' => 'Nombre'],
            ['key' => 'email', 'label' => 'Email'],
        ];
    }

    // Refresh the user list when a user is created or updated
    #[On('user-created')]
    #[On('user-updated')]
    public function refresh() {}
};
?>

<div>
    <x-header title="Usuarios" separator>
        <x-slot:actions>
            <x-button label="Agregar Usuario" link="{{ route('users.create') }}" icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-table :headers="$this->headers()" :rows="$users" link="/users/{id}/edit">
    </x-table>
</div>
