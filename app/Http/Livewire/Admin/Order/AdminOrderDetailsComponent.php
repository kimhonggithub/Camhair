<?php

namespace App\Http\Livewire\Admin\Order;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\OrderItem;
use App\Models\Transaction;


class AdminOrderDetailsComponent extends AdminComponent
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
        return view('livewire.admin.order.admin-order-details-component',['orderdetails' => $orderdetails,'transactions' => $transaction]);
    }
}
