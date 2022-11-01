<?php

namespace App\Http\Livewire\Admin\Product\Products;


use App\Models\Category;
use App\Models\Colors;
use App\Models\Patterns;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminEditProductComponent extends Component
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
    public $Luster;
    public $pattern_id;
    public $color_id;
    public $Lenght;
    public $size;
    public $category_id;
    public $new_image;
   
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'image' => 'required',
        'reguler_price' => 'required',
        'discount' => 'required',
        'SKU' => 'required|string|max:255',
        'stock_status' => 'required',
        'featured'=> 'required',
        'quantity'=> 'required|integer',
        'color_id' => 'required',
        'pattern_id' => 'required',
        'Luster' => 'required',
        'Lenght'=> 'required',
        'category_id' => 'required',
        'sale_price' => 'nullable'
    ];
    public function mount($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->reguler_price = $product->reguler_price;
        $this->discount = $product->discount;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->category_id =$product->category_id;
        $this->image = $product->image;
        $this->Luster =$product->Luster ;
        $this->color_id=$product->color_id ;
        $this-> pattern_id=$product->pattern_id  ;
        $this -> Lenght = $product->Lenght;
        $this -> size = $product->size ;
        $this->product_id = $product->id;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
   
    public function updateproduct()
	{
        $this->validate();
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->reguler_price = $this->reguler_price;
        $product->discount = $this->discount;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->Luster = $this -> Luster;
        $product->color_id = $this -> color_id;
        $product->pattern_id = $this -> pattern_id;
        $product->Lenght = $this -> Lenght;
        $product->size = $this -> size;
        $product->category_id = $this->category_id;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if($this->new_image){
            $imageName = Carbon::now()->timestamp. '.' . $this->new_image->extension();
            $this->new_image->storeAs('',$imageName);
            $product->image = $imageName;
        }
       
        $product->save();
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully!']);
		return redirect()->route('admin.products');
		
	}
    public function render()
    {
        $colors = Colors::all();
        $Patterns = Patterns::all();
        $products = Product::query();
        $categories = Category::all();
        return view('livewire.admin.product.products.admin-edit-product-component',[
            'categories'=> $categories,
            'colors' => $colors,
            'Patterns' => $Patterns,
            'products' => $products,
        ]);
    }
   
}
