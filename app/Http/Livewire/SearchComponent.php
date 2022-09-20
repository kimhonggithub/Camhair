<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{

    public $sorting;
    public $pagesize;
    public $search;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 16;
        $this->fill(request()->only('search'));
        
        
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
            $products = Product::where('name','like', '%' . $this->search . '%')->orderBy('created_at','DESC')-> paginate($this->pagesize);
        }
        else if($this->sorting=='price'){
            $products = Product::where('name','like', '%' . $this->search . '%')->orderBy('sale_price','ASC')-> paginate($this->pagesize);
        }
        else if($this->sorting=='price_desc'){
            $products = Product::where('name','like', '%' . $this->search . '%')->orderBy('sale_price','DESC')-> paginate($this->pagesize);
        }
        else{
            $products = Product::where('name','like', '%' . $this->search . '%')->paginate($this->pagesize);
        }

        $categories = Category::all();
        return view('livewire.search-component',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }
}
