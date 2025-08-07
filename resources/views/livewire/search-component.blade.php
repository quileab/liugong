<div data-theme="light" class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 px-16 md:px-64">
    {{-- Search input and category select --}}
    <x-input icon="o-magnifying-glass" placeholder="Buscar..." wire:model.live="search" />
    <x-select placeholder="Categoría" :options="$categories" wire:model.live="category_id" />
</div>