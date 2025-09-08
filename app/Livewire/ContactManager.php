<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactManager extends Component
{
    public $contacts;
    public $showDetailModal = false;
    public $selectedContact;

    public function mount()
    {
        $this->contacts = Contact::orderByDesc('created_at')->get();
    }

    public function render()
    {
        return view('livewire.contact-manager');
    }

    public function viewMessage($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 'attended';
        $contact->save();

        $this->selectedContact = $contact;
        $this->showDetailModal = true;

        $this->contacts = Contact::orderByDesc('created_at')->get();
    }
}