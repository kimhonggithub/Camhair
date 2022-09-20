<?php

namespace App\Http\Livewire\Admin;

use App\Models\OrderItem;
use App\Models\Transaction;
use Livewire\Component;

class AdminOrderDetailsComponent extends Component
{
    public $orderId;
    public function mount($id)
    {
        $this->orderId = $id;

    }
    public function changeTransactionStatus($id,$status)
    {
        $updatetransaction = Transaction::find($id);
        $updatetransaction->status = $status;
        $updatetransaction->save();
    }
    public function render()
    {
        $orderdetails = OrderItem::where('order_id',$this->orderId)->get();
        $transaction = Transaction::where('order_id',$this->orderId)->get();
        return view('livewire.admin.admin-order-details-component',['orderdetails' => $orderdetails,'transactions' => $transaction])->layout('layouts.base');
    }
}
