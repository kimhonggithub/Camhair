<?php

namespace App\Http\Livewire\Admin\Product\Products\Wefted;

use App\Models\Category;
use App\Models\Colors;
use App\Models\Lenght;
use App\Models\Patterns;
use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminEditWefted extends Component
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
    public $quantity;
    public $images=[];
    public $Luster;
    public $pattern_id;
    public $color_id;
    public $category_id;
    public $new_image;
    public $lenghts_id;

    public $product_thumbnail;
    public $product_id;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'reguler_price' => 'required',
        'discount' => 'required',
        'SKU' => 'required|string|max:255',
        'stock_status' => 'required',
        'quantity'=> 'required|integer',
        'color_id' => 'required',
        'pattern_id' => 'required',
        'lenghts_id' => 'required',
        'Luster' => 'required',
        'sale_price' => 'nullable',  
        'product_thumbnail'  => 'required'
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
        $this->quantity = $product->quantity;
        $this->category_id = $product->category_id;
        $this->product_thumbnail= $product->product_thumbnail;
        $this->Luster =$product->Luster ;
        $this->color_id=$product->color_id ;
        $this->pattern_id=$product->pattern_id  ;
        $this->lenghts_id = $product->lenghts_id;
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
        $product->lenghts_id = $this -> lenghts_id;
        $product->category_id = $this->category_id;
        $product->quantity = $this->quantity;
        

        if($this->new_image){
            
            $imageName = Carbon::now()->timestamp. '.' . $this->new_image->extension();
            $this->new_image->storeAs('',$imageName);
            $product->product_thumbnail = $imageName;
        }

        $product->save();

        if($this->images != ''){
            foreach($this->images as $key => $image){
                $pimage = new ProductImage();
                $pimage->product_id = $product->id;
                    $imageName = Carbon::now()->timestamp.$key.'.'.$this->images[$key]->extension();
                    $this->images[$key]->storeAs('all',$imageName);
                $pimage->image_name= $imageName;
                $pimage->save();
            }
        }
        $this->iamges = '';
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Wefted updated successfully!']);
		return redirect()->route('admin.wefted');
	}
    public function deleteImage($id){
        $image = ProductImage::where('id',$id)->first();
        $image->delete();
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Image delete successfully!']);
    }
    public function render()
    {
        $colors = Colors::all();
        $lenghts =Lenght::all();
        $Patterns = Patterns::all();
        $products = Product::query();
        $cat_name = Category::where('name','Wefted Hair')->first()->name;
        $pimages = ProductImage::where('product_id',$this->product_id)->get();
        return view('livewire.admin.product.products.wefted.admin-edit-wefted',[
            'cat_name'=> $cat_name,
            'colors' => $colors,
            'Patterns' => $Patterns,
            'products' => $products,
            'lenghts' => $lenghts,
            'pimages' => $pimages
        ]);
    }
   
}
