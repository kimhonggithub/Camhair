<?php

namespace App\Http\Livewire\Admin\Product\Category;

use App\Models\Category;
use Livewire\Component;



class AdminCategoryComponent extends Component
{
    
    public function render()
    {
        $categories = Category::get();
        return view('livewire.admin.product.category.admin-category-component',['categories'=>$categories]);
    }
}
