<?php

namespace App\Http\Livewire\Admin\Product\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $slug;
    public $name;
    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::where('slug',$category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function UpdateCategory()
    {
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('msg','Category edited successfully');
        return redirect()->route('admin.category');


    }
    public function render()
    {
        return view('livewire.admin.product.category.admin-edit-category-component');
    }
}
