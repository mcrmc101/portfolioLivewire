<?php

namespace App\Livewire\Items;

use Livewire\Attributes\On;
use Livewire\Component;

class ItemImage extends Component
{
    public $media;
    public $mimeType;
    public $openModal = false;
    public $isMasonry = false;

    public function mount($mediaVar)
    {
        $this->media = $mediaVar;
        $this->mimeType = strtok($this->media->mime_type, '/');
    }

    public function showModal()
    {
        $this->openModal = true;
        $this->dispatch('render-modal', ['media' => $this->media]);
    }

    #[On('close-modal')]
    public function closeModal()
    {
        $this->openModal = false;
    }

    public function render()
    {
        return view('livewire.items.item-image');
    }
}
