<div x-data="{}" x-init="$nextTick(() => {
    new Sortable($refs.imageList, {
        animation: 200,
        handle: '.handle', // Drag handle
        onEnd: function (evt) {
            const orderedIds = Array.from(evt.to.children).map(item => ({ value: item.dataset.id }));
            @this.call('updateOrder', orderedIds);
        },
    });
})">
    <x-header title="Carousel Manager" separator>
        <x-slot:actions>
            <x-button label="Add Slide" @click="$wire.create()" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <div class="relative">
        <div wire:loading.flex wire:target="updateOrder" class="absolute inset-0 bg-white bg-opacity-75 z-10 items-center justify-center" style="display: none;">
            <div class="text-center">
                <x-icon name="o-arrow-path" class="w-8 h-8 animate-spin mx-auto" />
                <p>Reordenando imágenes...</p>
            </div>
        </div>
        <div x-ref="imageList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" wire:loading.class="opacity-50" wire:target="updateOrder">
            @foreach($carousels as $slide)
            <div wire:key="{{ $slide['id'] }}" data-id="{{ $slide['id'] }}"
                    class="relative group bg-base-200 rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('app-files/' . $slide['image_path']) }}" alt="{{ $slide['title'] }}" class="h-48 w-full object-cover">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button class="handle cursor-grab text-white p-2 rounded-full mr-2">
                            <x-icon name="o-arrows-pointing-out" class="w-6 h-6" />
                        </button>
                        <x-button icon="o-pencil" @click="$wire.edit('{{ $slide['id'] }}')" class="btn-sm" />
                        <x-dropdown>
                            <x-slot:trigger>
                                <x-button icon="o-trash" class="btn-sm" />
                            </x-slot:trigger>
                            <x-menu-item title="Cancel" @click="" />
                            <x-menu-item title="Delete" wire:click="delete('{{ $slide['id'] }}')" class="text-red-500" />
                        </x-dropdown>
                    </div>
                    <div class="absolute bottom-2 left-2 text-white text-sm bg-black bg-opacity-70 px-2 py-1 rounded">
                        {{ $slide['title'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <x-modal wire:model="showModal" title="{{ $isEdit ? 'Edit Slide' : 'Add new slide' }}">
        <x-form wire:submit.prevent="save">
            <x-file label="Image" wire:model="image" accept="image/*" />
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" class="h-20 w-20 object-cover mt-2">
            @elseif ($image_path)
                <img src="{{ asset('app-files/' . $image_path) }}" class="h-20 w-20 object-cover mt-2">
            @endif
            <x-input label="Title" wire:model="title" />
            <x-textarea label="Description" wire:model="description" />
            <x-input label="URL" wire:model="url" />
            <x-input label="URL Text" wire:model="url_text" />

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.showModal = false" />
                <x-button label="Save" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
@endpush