<div>
    <x-header title="Gestor de Contactos" separator />

    <x-card>
        <x-table :headers="[
            ['key' => 'name', 'label' => 'Nombre'],
            ['key' => 'email', 'label' => 'Correo Electrónico'],
            ['key' => 'subject', 'label' => 'Asunto'],
            ['key' => 'status', 'label' => 'Estado'],
            ['key' => 'created_at', 'label' => 'Recibido El'],
            ['key' => 'actions', 'label' => ''],
        ]" :rows="$contacts" striped>
            @scope('cell_status', $contact)
                <x-badge :value="$contact->status == 'unseen' ? 'No Visto' : 'Atendido'" class="{{ $contact->status == 'unseen' ? 'badge-error' : 'badge-success' }}" />
            @endscope
            @scope('cell_actions', $contact)
                <div class="flex justify-end">
                    <x-button icon="o-eye" class="btn-sm" wire:click="viewMessage({{ $contact->id }})" />
                </div>
            @endscope
        </x-table>
    </x-card>

    <x-modal wire:model="showDetailModal" title="Detalles del Mensaje">
        <div class="space-y-4">
            <p><strong>Nombre:</strong> {{ $selectedContact->name ?? '' }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $selectedContact->email ?? '' }}</p>
            <p><strong>Teléfono:</strong> {{ $selectedContact->phone ?? '' }}</p>
            <p><strong>Asunto:</strong> {{ $selectedContact->subject ?? '' }}</p>
            <p><strong>Mensaje:</strong> {{ $selectedContact->message ?? '' }}</p>
            <p><strong>Recibido El:</strong> {{ $selectedContact->created_at ?? '' }}</p>
        </div>
        <x-slot:actions>
            <x-button label="Cerrar" @click="$wire.showDetailModal = false" />
                        <a href="mailto:{{ $selectedContact->email ?? '' }}?subject={{ urlencode($selectedContact->subject ?? '') }}" target="_blank">
                <x-button label="Responder" icon="o-envelope" class="btn-primary" />
            </a>
            @php
                $whatsappNumber = $selectedContact->phone ?? '5491123456789'; // Use contact phone or default
                $whatsappMessage = urlencode("Hola " . ($selectedContact->name ?? '') . ", respecto a tu mensaje con asunto: " . ($selectedContact->subject ?? '') . ".");
            @endphp
            <a href="https://wa.me/{{ $whatsappNumber }}?text={{ $whatsappMessage }}" target="_blank">
                <x-button label="WhatsApp" icon="o-chat-bubble-left" class="btn-success" />
            </a>
        </x-slot:actions>
    </x-modal>
</div>