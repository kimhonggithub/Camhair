<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class AdminDeleteCategoryComponent extends Component
{
    public function mount($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        session()->flash('msg','Category deleted successfully');
        return redirect()->route('admin.category');
    }
    public function render()
    {
        return view('livewire.admin.admin-delete-category-component')->layout('layouts.base');
    }
}
