<?php

namespace App\Http\Livewire\Admin\Product\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('msg','Product deleted successfully');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.product.products.admin-product-component',['products' => $products]);
    }
}
