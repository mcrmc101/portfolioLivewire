<?php

namespace App\Livewire;

use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;

class ContactForm extends Component
{
    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $email;
    public $phone;
    #[Validate('required')]
    public $content;

    public function createMessage()
    {
        Contact::create($this->only([
            'name',
            'email',
            'phone',
            'content',
        ]));
        $this->dispatch('alertBanner', data: [
            'status' => 'success',
            'statusMessage' => "Thanks for your message. We'll be in touch asap.",
        ])->to(AlertBanner::class);
        $this->reset();
    }


    public function render(): View
    {
        return view('livewire.contact-form');
    }
}
