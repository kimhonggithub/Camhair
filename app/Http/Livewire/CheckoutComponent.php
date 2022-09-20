<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $is_shipping_different;

    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $subtotal;
    public $province;
    public $country;
    public $zipcode;
    public $payment_method;

    public function mount()
    {
        $this->is_shipping_different = 0;
        $this->line1 = '1';
        $this->subtotal = Cart::subtotal();
    }
    
    public function placeOrder()
    {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = $this->subtotal;
        $order->tax = Cart::tax();
        $order->total = Cart::total();
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->is_shipping_different;
        $order->save();


        foreach (Cart::content() as $item)
        {
            $orderitem = new OrderItem();
            $orderitem->product_id = $item->id;
            $orderitem->order_id = $order->id;
            $orderitem->price = $item->subtotal();
            $orderitem->quantity = $item->qty;
            $orderitem->save();
        }

        if($this->payment_method == 'cod')
        {
            $trasaction = new Transaction();
            $trasaction->user_id = Auth::user()->id;
            $trasaction->order_id = $order->id;
            $trasaction->mode = 'cod';
            $trasaction->status = 'pending';
            $trasaction->save();

            
        }

        Cart::destroy();

        return redirect()->route('user.dashboard');
    }

    public function render()
    {
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
