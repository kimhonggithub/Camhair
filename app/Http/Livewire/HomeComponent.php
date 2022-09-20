<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class HomeComponent extends Component
{

    public $sorting;
    public $pagesize;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 16;
    }
    public function  store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_massage','Item added succesfully');
        return redirect()->route('product.cart');
    }
    
    use WithPagination;
    public function render()
    {
        if($this->sorting=='date'){
            $products = Product::orderBy('created_at','DESC')-> paginate($this->pagesize);
        }
        else if($this->sorting=='price'){
            $products = Product::orderBy('sale_price','ASC')-> paginate($this->pagesize);
        }
        else if($this->sorting=='price_desc'){
            $products = Product::orderBy('sale_price','DESC')-> paginate($this->pagesize);
        }
        else{
            $products = Product::paginate($this->pagesize);
        }

        $categories = Category::all();
        $slider = HomeSlider::all();
        return view('livewire.home-component',['products'=>$products,'categories'=>$categories,'slider'=>$slider])->layout('layouts.base');
    }
}
