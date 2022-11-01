<?php

namespace App\Http\Livewire\FrontEnd\Home;


use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithPagination;


class HomeComponent extends Component{
    use WithPagination;
    public function render(){
        $slider = HomeSlider::all();
        return view('livewire.frontend.home.home-component',['slider'=>$slider])->layout('layouts.base');
    }
}
