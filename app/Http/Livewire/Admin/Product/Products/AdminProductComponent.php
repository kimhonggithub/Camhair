<?php

namespace App\Http\Livewire\Admin\Product\Products;

use App\Models\Product;
use App\Models\Colors;
use App\Models\Patterns;
use Carbon\Carbon;
use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class AdminProductComponent extends AdminComponent
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
        public $stock_status;
        public $featured;
        public $quantity;
        public $image;
        public $category_id;
        public $Luster;
        public $pattern_id;
        public $color_id;
        public $Lenght;
        public $size;
        public $productIdBeingRemoved = null;
        public $searchTerm = null;
        public $state = [];
        public $product_id;
        public $wefname;
        public $show= false;
     
        protected $queryString = ['searchTerm' => ['except' => '']];
        public $sortColumnName = 'created_at';
        public $sortDirection = 'desc';
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
            'sale_price' => 'nullable',
            'category_id' => 'required'
        ];
        public function mount()
        {
            $this->stock_status = 'instock';
            $this->Luster = 'Low';
            $this->featured= 0;
            $this->size = 0;

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
        $product->Luster = $this -> Luster;
        $product->color_id = $this -> color_id;
        $product->pattern_id = $this -> pattern_id;
        $product->Lenght = $this -> Lenght;
        $product->category_id=$this->category_id;
       
        $product->featured = $this->featured;
        if($this->show){
            $this->size = 0;
        }else{
            $product->size = $this -> size;
         }
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('',$imageName);
        $product->image = $imageName;
        $product->quantity = $this->quantity;
        $product->save();
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
        $categories = Category::all();
        $Patterns = Patterns::all();
        $products = Product::query()
    		->where('name', 'like', '%'.$this->searchTerm.'%')
    		->orWhere('Luster', 'like', '%'.$this->searchTerm.'%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(5);
        return view('livewire.admin.product.products.admin-product-component', [
            'categories' => $categories,
            'colors' => $colors,
            'Patterns' => $Patterns,
            'products' => $products,
            ]);
           
    }

}
