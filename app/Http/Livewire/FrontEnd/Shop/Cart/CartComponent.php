<?php

namespace App\Http\Livewire\FrontEnd\Shop\Cart;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }
    public function delete_cart_item($rowId){
        Cart::remove($rowId);
        session()->flash('success_massage','Item has been DELETED');
    }
    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }
    public function render()
    {
        return view('livewire.frontend.shop.cart.cart-component')->layout('layouts.base');
    }
}
