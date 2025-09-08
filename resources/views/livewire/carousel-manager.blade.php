<div>
    <x-header title="Carousel Manager" separator>
        <x-slot:actions>
            <x-button label="Add Slide" @click="$wire.create()" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($carousels as $slide)
            <x-card title="{{ $slide->title }}" subtitle="Order: {{ $slide->order }}">
                                                                <img src="{{ Str::startsWith($slide->image_path, ['http://', 'https://']) ? $slide->image_path : (Str::startsWith($slide->image_path, 'images/') ? asset($slide->image_path) : asset('storage/' . $slide->image_path)) }}" alt="{{ $slide->title }}" class="h-48 w-full object-cover">
                <x-slot:actions>
                    <x-button icon="o-pencil" @click="$wire.edit({{ $slide->id }})" class="btn-sm" />
                    <x-dropdown>
                        <x-slot:trigger>
                            <x-button icon="o-trash" class="btn-sm" />
                        </x-slot:trigger>
                        <x-menu-item title="Cancel" @click="" />
                        <x-menu-item title="Delete" wire:click="delete({{ $slide->id }})" class="text-red-500" />
                    </x-dropdown>
                </x-slot:actions>
            </x-card>
        @endforeach
    </div>

    <x-modal wire:model="showModal" title="{{ $isEdit ? 'Edit Slide' : 'Add new slide' }}">
        <x-form wire:submit.prevent="save">
                        <x-file label="Image" wire:model="image" accept="image/*" />
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" class="h-20 w-20 object-cover mt-2">
            @elseif ($image_path)
                <img src="{{ $image_path }}" class="h-20 w-20 object-cover mt-2">
            @endif
            <x-input label="Title" wire:model="title" />
            <x-textarea label="Description" wire:model="description" />
            <x-input label="URL" wire:model="url" />
            <x-input label="URL Text" wire:model="url_text" />
            <x-input label="Order" wire:model="order" type="number" />

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.showModal = false" />
                <x-button label="Save" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>