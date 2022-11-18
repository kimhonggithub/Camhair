<?php

namespace App\Http\Livewire\Frontend\Shop\Shopping;

use App\Models\Category;
use App\Models\Colors;
use App\Models\Patterns;
use App\Models\Product;
use Cart;

use Livewire\Component;
use Livewire\WithPagination;

class ShopPatternComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $pattern_id;

    public function mount($pattern_id)
    {
        $this->sorting = "default";
        $this->pagesize = 16;
        $this->pattern_id = $pattern_id;
    }
    public function  store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');

        session()->flash('success_massage', 'Item added succesfully');

        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        $pattern = Patterns::where('id', $this->pattern_id)->first();
        $pattern_id = $pattern->id;
        $pattern_name = $pattern->name;
        if ($this->sorting == 'date') {
            $products = Product::where('pattern_id', $pattern_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price') {
            $products = Product::where('pattern_id', $pattern_id)->orderBy('sale_price', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price_desc') {
            $products = Product::where('pattern_id', $pattern_id)->orderBy('sale_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::where('pattern_id', $pattern_id)->paginate($this->pagesize);
        }

        $categories = Category::all();
        $colors = Colors::all();
       
        return view('livewire.frontend.shop.shopping.shop-pattern-component', [
            'products' => $products,
            'categories' => $categories,
            'pattern_name' => $pattern_name,
            'colors' => $colors,
           
        ])->layout('layouts.base');
    }
}
