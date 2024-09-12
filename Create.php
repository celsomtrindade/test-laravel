<?php

namespace App\Livewire\Pages\Contacts;

use App\Livewire\Forms\ContactForm;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public ContactForm $form;

    public function mount()
    {
        Log::info('Modal mount()');
    }

    // #[On('load-item')]
    // public function loadItem(mixed $contact)
    // {
    //     Log::info('Modal: loadItem()', ['contact' => $contact]);
    //     $this->form->setType($contact);
    // }

    public function justDebug() {
        Log::info('just debugging...');
    }

    public function save()
    {
        Log::info('Modal: save()');
        $contact = $this->form->save();

        $this->dispatch('item-saved', $contact);
    }

    public function render()
    {
        return view('livewire.pages.contacts.create');
    }
}
