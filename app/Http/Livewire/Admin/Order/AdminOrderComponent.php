<?php

namespace App\Http\Livewire\Admin\Order;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Order;

use Livewire\WithPagination;

class AdminOrderComponent extends AdminComponent
{
    use WithPagination;
  
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')
        
        ->paginate(12);
        return view('livewire.admin.order.admin-order-component',['orders' => $orders]);
    }
}
