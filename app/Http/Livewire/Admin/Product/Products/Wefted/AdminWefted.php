<?php
namespace App\Http\Livewire\Admin\Product\Products\Wefted;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Product;
use App\Models\Colors;
use App\Models\Patterns;
use App\Models\Category;
use App\Models\Lenght;
use App\Models\ProductImage;
use App\Models\Wigcap;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Livewire\WithFileUploads;

class AdminWefted extends AdminComponent
{
    use WithFileUploads;
    public $showEditModal = false;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $reguler_price;
    public $discount;
    public $sale_price;
    public $SKU;
    public $Luster;
    public $stock_status;
    public $quantity;
    public $category_id;
    public $pattern_id;
    public $color_id;
    public $lenghts_id;
    public $sizevalue_id;
    public $wigcaps_id;
    public $productIdBeingRemoved = null;
    public $searchTerm = null;
    public $product_id;
    public $images = [];

    public $product_thumbnail;
    protected $queryString = ['searchTerm' => ['except' => '']];
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';
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
            'sizevalue_id' => 'nullable',
            'lenghts_id' => 'required',
            'Luster' => 'required',
            'sale_price' => 'nullable',  
            'product_thumbnail'  => 'image|max:1024'
        ];
        public function mount()
        {
            $this->stock_status = 'instock';
            $this->Luster = 'Low';
            $this->sizevalue_id = null;
        }
        public function sortBy($columnName)
        {
            if ($this->sortColumnName === $columnName) {
                $this->sortDirection = $this->swapSortDirection();
            } else {
                $this->sortDirection = 'asc';
            }
    
            $this->sortColumnName = $columnName;
        }
        public function swapSortDirection()
        {
            return $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }
        public function generateSlug()
        {
            $this->slug = Str::slug($this->name);
        }
    public function updatedSearchTerm()
        {
            $this->resetPage();
        }
    public function addNew(){
		// $this->resetPage();
        $this->reset();
		$this->showEditModal = false;
		$this->dispatchBrowserEvent('show-form');
	}
	public function addProduct(){
        $cat = Category::where('name','Wefted Hair')->first()->id; 
        $this->validate();
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
        $product->Luster = $this->Luster;
        $product->quantity = $this->quantity;
        $product->color_id = $this->color_id;
        $product->pattern_id = $this->pattern_id;
        $product->lenghts_id = $this ->lenghts_id;
      
        $imageName = Carbon::now()->timestamp. '.'. $this->product_thumbnail->extension();
        $this->product_thumbnail->storeAs('',$imageName);
        $product->product_thumbnail = $imageName;
        
        $product->category_id= $cat;
        $product->sizevalue_id =  null;
        $product->wigcaps_id = null;
        $product->save();
        foreach($this->images as $key => $image){
            $pimage = new ProductImage();
            $pimage->product_id = $product->id;
            $imageName = Carbon::now()->timestamp.$key.'.'.$this->images[$key]->extension();
            $this->images[$key]->storeAs('all',$imageName);
            $pimage->image_name= $imageName;
            $pimage->save();
        }
        
        
		$this->dispatchBrowserEvent('hide-form', ['message' => 'Add product successfully!']);
	}
    public function confirmproductRemoval($product_id)
	{
		$this->productIdBeingRemoved = $product_id;

		$this->dispatchBrowserEvent('show-delete-modal');
	}
    public function deleteproduct()
	{
		$product = Product::findOrFail($this->productIdBeingRemoved);

		$product->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'product deleted successfully!']);
	}

    public function render()
    {
        
        $colors = Colors::all();
        $lenghts = Lenght::all();
        $wigcaps = Wigcap::all();
        $Patterns = Patterns::all();
        $cat = Category::where('name','Wefted Hair')->first()->id;
        $cat_name = Category::where('name','Wefted Hair')->first()->name;
        $products = Product::search($this->searchTerm,$cat)
            // ->where('category_id',1)
            // ->search($this->searchTerm,1)
            // ->orWhere('Luster','like', '%'.$this->searchTerm.'%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(5);
       
        return view('livewire.admin.product.products.wefted.admin-wefted', [
            'colors' => $colors,
            'Patterns' => $Patterns,
            'products' => $products,
            'lenghts' => $lenghts,
            'wigcaps' => $wigcaps,
            'cat_name' => $cat_name
            ]);
 
    }
   
}
