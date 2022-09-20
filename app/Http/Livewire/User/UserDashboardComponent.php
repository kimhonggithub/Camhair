<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function changeorderStatus($id,$status)
    {
        $updatedOrder = Order::find($id);
        $updatedOrder->status = $status;
        $updatedOrder->save();
    }
    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('livewire.user.user-dashboard-component',['orders' => $orders])->layout('layouts.base');
    }
}
