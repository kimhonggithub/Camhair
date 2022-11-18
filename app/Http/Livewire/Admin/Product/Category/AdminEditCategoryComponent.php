<?php

namespace App\Http\Livewire\Admin\Product\Category;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditCategoryComponent extends AdminComponent
{
    use WithFileUploads;
    public $category_slug;
    public $category_id;
    public $new_image;
    public $slug;
    public $name;
    protected $rules =[
        'name' => 'required|max:50',
        'image_cat' => 'required'
    ];
    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::where('slug',$category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->image_cat = $category->image_cat;
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
        if($this->new_image){
            $imageName = Carbon::now()->timestamp. '.' . $this->new_image->extension();
            $this->new_image->storeAs('',$imageName);
            $category->image_cat = $imageName;
        }
        $category->save();

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Category edited successfully']);
        return redirect()->route('admin.category');
    }
    public function render()
    {
        return view('livewire.admin.product.category.admin-edit-category-component');
    }
}
