<?php

use function Livewire\Volt\{layout};

layout('components.layouts.app');

?>

<div>
    <x-card title="Dashboard" subtitle="Bienvenido a tu Dashboard">
        <x-slot:actions>
            <x-button label="Agregar Categoría" link="/categories/create" icon="o-plus" class="btn-primary" />
            <x-button label="Agregar Producto" link="/products/create" icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-card>
</div>