<?php

namespace App\Http\Livewire\FrontEnd\Shop;

use App\Models\Product;
use App\Models\Category;
use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{

 
    
    public function render()
    {
        
        return view('livewire.frontend.shop.shop-component')->layout('layouts.base');
    }
}
