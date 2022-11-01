<?php

namespace App\Http\Livewire\FrontEnd\Blog;
use App\Models\Category;
use App\Models\HomeSlider;
use Livewire\Component;
use App\Models\Product;
class BlogComponent extends Component
{   
    public $sorting;
    public $pagesize;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 16;
    }
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
        return view('livewire.frontend.blog.blog-component',['products'=>$products,'categories'=>$categories,'slider'=>$slider])->layout('layouts.base');
    }
}
