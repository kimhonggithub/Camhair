<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\Sizevalue;
use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Category;

class Adminsize extends AdminComponent
{
    public $showEditModal = false;
    public $value_sizes;
    public $category_id;
    public $sizevalueIdBeingRemoved = null;
    public $searchTerm = null;
    public $sizevalue_id;
    public $show= false;
    protected $queryString = ['searchTerm' => ['except' => '']];
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';
    protected $rules = [
            'value_sizes' => 'required|max:12',
            'category_id'=> 'required',   
    ];
    public function sortBy($columnName){
        if ($this->sortColumnName === $columnName) {
                $this->sortDirection = $this->swapSortDirection();
        } else {
                $this->sortDirection = 'asc';
        }
        $this->sortColumnName = $columnName;
    }
    public function swapSortDirection(){
            return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
    public function updatedSearchTerm(){
            $this->resetPage();
    }
    public function addNew(){
        $this->reset();
		$this->showEditModal = false;
		$this->dispatchBrowserEvent('show-form');
	}
	public function addsizevalue(){
        $this->validate();
		$sizevalue = new Sizevalue();
        $sizevalue->value_sizes = $this->value_sizes;
        $sizevalue->category_id = $this->category_id;     
        $sizevalue->save();
		$this->dispatchBrowserEvent('hide-form', ['message' => 'Add Size Successfully!']);
	}
    public function confirmsizevalueRemoval($sizevalue_id)
	{
		$this->sizevalueIdBeingRemoved = $sizevalue_id;

		$this->dispatchBrowserEvent('show-delete-modal');
	}
    public function deletesizevalue()
	{
		$sizevalue = sizevalue::findOrFail($this->sizevalueIdBeingRemoved);

		$sizevalue->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Size deleted successfully!']);
	}
    public function render()
    {
        $categories = Category::all();
        $sizevalues = Sizevalue::query()
    		->where('category_id','like', '%'.$this->searchTerm.'%')
            ->orWhere('value_sizes','like','%'.$this->searchTerm.'%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(10);
        return view('livewire.admin.subcategory.adminsize', [
            'categories' =>  $categories,
            'sizevalues' => $sizevalues,
            ]);
           
    }
   
}
