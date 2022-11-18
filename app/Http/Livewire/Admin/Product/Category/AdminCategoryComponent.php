<?php

namespace App\Http\Livewire\Admin\Product\Category;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Category;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Str;

class AdminCategoryComponent extends AdminComponent
{
    use WithFileUploads;
    public $showEditModal = false;
    public $name;
    public $slug;
    public $image_cat;
    public $category_id;
    public $categoryIdBeingRemoved;
  
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function addNew(){
        $this->reset();
		$this->showEditModal = false;
		$this->dispatchBrowserEvent('show-form');
	}
	public function addcat(){
   
		$category = new Category();
        $category->name = $this->name;

        $imageName = Carbon::now()->timestamp . '.' . $this->image_cat->extension();
        $this->image_cat->storeAs('', $imageName);
        $category->image_cat = $imageName;
        $category->slug = $this->slug;
        $category->save();
		$this->dispatchBrowserEvent('hide-form', ['message' => 'Add Size Successfully!']);
	}
    public function confirmcatRemoval($category_id)
	{
		$this->categoryIdBeingRemoved = $category_id;

		$this->dispatchBrowserEvent('show-delete-modal');
	}
    public function deletecat()
	{
		$category = Category::findOrFail($this->categoryIdBeingRemoved);

		$category->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Category deleted successfully!']);
	}
    public function render()
    {
        $categories = Category::query()
            ->paginate(10);;
        return view('livewire.admin.product.category.admin-category-component',['categories'=>$categories]);
    }
}

