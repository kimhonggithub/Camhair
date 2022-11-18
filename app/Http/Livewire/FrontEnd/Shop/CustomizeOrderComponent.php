<?php

namespace App\Http\Livewire\Frontend\Shop;

use Livewire\Component;

class CustomizeOrderComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.shop.customize-order-component')->layout('layouts.base');
    }
}
