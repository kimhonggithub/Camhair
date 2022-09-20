<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $reguler_price;
    public $discount;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function addProduct()
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->reguler_price = $this->reguler_price;
        $product->discount = $this->discount;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('',$imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('msg','Product added successfully');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component',['categories' => $categories])->layout('layouts.base');
    }
}
