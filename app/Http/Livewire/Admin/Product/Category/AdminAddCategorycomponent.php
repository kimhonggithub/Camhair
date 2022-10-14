<?php

namespace App\Http\Livewire\Admin\Product\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
class AdminAddCategorycomponent extends Component
{
    public $name;
    public $slug;
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function addCategory(){
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('msg','Category added successfully');
        return redirect()->route('admin.category');  
    }
    public function render()
    {
        return view('livewire.admin.product.category.admin-add-categorycomponent');
    }
}
