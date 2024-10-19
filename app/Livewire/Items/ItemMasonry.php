<?php

namespace App\Livewire\Items;

use App\Models\Item;
use Livewire\Component;

class ItemMasonry extends Component
{
    public $items;

    public function mount()
    {
        $this->items = Item::all();
    }

    public function render()
    {
        return view('livewire.items.item-masonry');
    }
}
