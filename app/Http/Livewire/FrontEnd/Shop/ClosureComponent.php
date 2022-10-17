<?php

namespace App\Http\Livewire\Frontend\Shop;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Cart;
class ClosureComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;
    public function render()
    {
        $category = Category::where('slug','closure')->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if($this->sorting=='date'){
            $products = Product::where('category_id',$category_id)->orderBy('created_at','DESC')-> paginate($this->pagesize);
        }
        else if($this->sorting=='price'){
            $products = Product::where('category_id',$category_id)->orderBy('sale_price','ASC')-> paginate($this->pagesize);
        }
        else if($this->sorting=='price_desc'){
            $products = Product::where('category_id',$category_id)->orderBy('sale_price','DESC')-> paginate($this->pagesize);
        }
        else{
            $products = Product::where('category_id',$category_id)->paginate($this->pagesize);
        }

        $categories = Category::all();
        return view('livewire.frontend.shop.closure.closure-component',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }
   
}
