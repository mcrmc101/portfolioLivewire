<?php

namespace App\Livewire\Items;

use App\Models\Item;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ItemPage extends Component
{
    public $item;

    public function mount($slug)
    {
        $this->item = Item::where('slug', $slug)->first();
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.items.item-page');
    }
}
