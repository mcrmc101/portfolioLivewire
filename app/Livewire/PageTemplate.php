<?php

namespace App\Livewire;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PageTemplate extends Component
{
    public $page;

    public function mount()
    {
        $this->page = Page::first();
        if (!$this->page) {
            return $this->redirectRoute('construction');
        }
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.page-template');
    }
}
