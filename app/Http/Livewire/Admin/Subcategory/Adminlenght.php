<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Lenght;


class Adminlenght extends AdminComponent
{
   
    public $showEditModal = false;
    public $values;
    public $lenghtIdBeingRemoved = null;
    public $searchTerm = null;
    public $lenght_id;
    public $show= false;
    protected $queryString = ['searchTerm' => ['except' => '']];
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';
    protected $rules = [
            'values' => 'required|min:1|max:4|unique:lenghts',
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
		// $this->resetPage();
        $this->reset();
		$this->showEditModal = false;
		$this->dispatchBrowserEvent('show-form');
	}
	public function addlenght(){
        $this->validate();
		$lenght = new Lenght();
        $lenght->values = $this->values;
        
        $lenght->save();
		$this->dispatchBrowserEvent('hide-form', ['message' => 'Add Lenght successfully!']);
	}
    public function confirmlenghtRemoval($lenght_id)
	{
		$this->lenghtIdBeingRemoved = $lenght_id;

		$this->dispatchBrowserEvent('show-delete-modal');
	}
    public function deletelenght()
	{
		$lenght = Lenght::findOrFail($this->lenghtIdBeingRemoved);

		$lenght->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'lenght deleted successfully!']);
	}
    public function render()
    {
        $lenghts = Lenght::query()
    		->where('values', 'like', '%'.$this->searchTerm.'%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(10);
        return view('livewire.admin.subcategory.adminlenght', [
            'lenghts' => $lenghts,
            ]);
           
    }
}