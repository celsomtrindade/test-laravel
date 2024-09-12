<?php

namespace App\Livewire\Forms;

use App\Enums\ContactTypeEnum;
use App\Models\Web\Contact;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate('required|string|max:80')]
    public string $name = '';

    #[Validate('required|integer')]
    public ContactTypeEnum $type = ContactTypeEnum::CLIENT;

    public function mount() {
        Log::info('ContactForm: mount()');
    }

    public function setType(Contact $contact): Void
    {
        if (!empty($contact->id)) {
            $this->name = $contact->name;
            $this->type = ContactTypeEnum::from($contact->type) ?? false;
        }

        Log::info('ContactForm: setType()', [
            'contact' => $contact,
            'name' => $this->name,
            'type' => $this->type,
        ]);
    }

    public function save()
    {
        Log::info('ContactForm: save()');

        $this->validate();

        $new_contact = Contact::create($this->only(['name', 'type']));

        Log::info('ContactForm: save() - created', [
            'new_contact' => $new_contact,
        ]);

        $this->reset();
    }
}
