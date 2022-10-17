<?php

namespace App\Http\Livewire\Admin\Product\Products\Closure;

use App\Models\Category;
use App\Models\Closure;
use App\Models\Product;
use App\Models\Wigcap;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Attribute;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddClosureComponent extends Component
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
    public $prodcut_id;
    public $size;
    public $wig_cap_id;
    public $producing_id;
    public $blend_id;
   
    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function addClosure(){
        $closure = new Closure();
        // $closure->wig_cap_id = $this->wig_cap_id;
        // $closure->producing_id= $this->producing_id;
        // $closure->blend_id = $this->blend_id->default('1');
        $closure->size = $this->size;
        // $closure->att_id = $this -> att_id;
        
        
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
        
        $closure->save();
        session()->flash('msg','product added successfully');
        return redirect()->route('admin.prodcutsclosure');
    }
    public function render()
    {
        $categories = Category ::all();
        $wigcaps = Wigcap:: all();
        return view('livewire.admin.product.products.closure.admin-add-closure-component',[
            'categories' => $categories,
            'wigcaps' => $wigcaps,

        ]);
    }
}
