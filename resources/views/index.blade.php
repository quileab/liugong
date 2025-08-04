<x-layouts.layout>
    <x-web-navbar></x-web-navbar>
    <main>
        <p>Contenido principal aquí.</p>
        <div class="grid grid-cols-3 gap-4">
        <x-web-card title="Mi Tarjeta">
            Contenido de la tarjeta.
        </x-web-card>
        <x-web-card title="Otra Tarjeta" footer="Pie de página de la tarjeta">
            Más contenido de la tarjeta.
        </x-web-card>
        <x-web-card title="Tarjeta con Botón">
            Contenido de la tarjeta con un botón.
            <x-button>Haz clic aquí</x-button>
        </x-web-card>
        </div>
    </main>
   <x-web-footer />
</x-layouts.layout>