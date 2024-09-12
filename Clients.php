<?php

namespace App\Livewire\Pages\Contacts;

use App\Enums\ContactTypeEnum;
use App\Models\Web\Contact;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;

    public function mount()
    {
        Log::info('Clients: mount()');
    }

    public function render()
    {
        $contacts = Contact::ofType(ContactTypeEnum::CLIENT)->paginate();

        return view('livewire.pages.contacts.clients', [
            'contacts' => $contacts,
        ]);
    }

    public function openModalEdit(Contact $contact): Void
    {
        Log::info('Clients: openModalEdit()', ['contact' => $contact]);
        $this->dispatch('load-item', contact: $contact);
    }
}
