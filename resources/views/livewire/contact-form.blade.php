<div data-theme="light" class="grid grid-cols-1 p-4 shadow-md rounded-lg">
    <x-form wire:submit.prevent="submit">
        <x-input label="Nombre" wire:model="name" />
                <x-input label="Correo Electrónico" wire:model="email" type="email" />
        <x-input label="Teléfono" wire:model="phone" type="tel" />
        <x-input label="Asunto" wire:model="subject" />
        <x-textarea label="Mensaje" wire:model="message" />

        <x-slot:actions>
            <x-button label="Enviar Mensaje" type="submit" class="bg-blue-900 hover:bg-blue-700 text-white" />
        </x-slot:actions>
    </x-form>

    @if (session()->has('message'))
        <x-alert title="¡Éxito!" description="{{ session('message') }}" icon="o-check-circle" class="mt-4" />
    @endif
</div>