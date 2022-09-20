<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order_id;
    public $id_order_temp;
    public function mount($id)
    {
        $this->order_id = $id;
    }
    public function render()
    {
        $orders = Order::where('id',$this->order_id)->get();
        $orderitms = OrderItem::where('order_id',$this->order_id)->get();
        $transaction = Transaction::where('order_id',$this->order_id)->get();
        return view('livewire.user.user-order-details-component',['orderdetails' => $orderitms,'order'=> $orders,'transactions' => $transaction])->layout('layouts.base');
    }
}
