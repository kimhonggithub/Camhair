<?php

namespace App\Http\Livewire\FrontEnd\Shop\Shopping;


use App\Models\Category;

use App\Models\Patterns;
use Livewire\Component;


class ShopComponent extends Component
{

 
    
    public function render()
    {
        $patterns = Patterns::all();
        $categories =Category::all();
        return view('livewire.frontend.shop.shopping.shop-component',[
            'patterns' => $patterns,
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
