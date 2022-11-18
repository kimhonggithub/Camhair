<?php
namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\Patterns;
use App\Http\Livewire\Admin\AdminComponent;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class Adminpattern  extends AdminComponent
{
    use WithFileUploads;
    public $showEditModal = false;
    public $name;
    public $image_pattern;

    public $patternvalueIdBeingRemoved = null;
    public $searchTerm = null;
    public $patternvalue_id;
    public $show= false;

    protected $queryString = ['searchTerm' => ['except' => '']];
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';

    protected $rules = [
            'name' => 'required|max:12',
            'image_pattern'=> 'required',   
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
	public function addpattern(){
        $this->validate();
		$pattern= new Patterns();
        $pattern->name = $this->name;

        $imageName = Carbon::now()->timestamp . '.' . $this->image_pattern->extension();
        $this->image_pattern->storeAs('', $imageName);
        $pattern->image_pattern = $imageName;
  
        $pattern->save();
		$this->dispatchBrowserEvent('hide-form', ['message' => 'Add pattern Successfully!']);
	}
    public function confirmpatternRemoval($patternvalue_id)
	{
		$this->patternvalueIdBeingRemoved = $patternvalue_id;

		$this->dispatchBrowserEvent('show-delete-modal');
	}
    public function deletepattern()
	{
		$patternvalue = Patterns::findOrFail($this->patternvalueIdBeingRemoved);

		$patternvalue->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Pattern deleted successfully!']);
	}
    public function render()
    {
        $patterns = Patterns::query()
    		->where('name','like', '%'.$this->searchTerm.'%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(10);
        return view('livewire.admin.subcategory.adminpattern', [
            'patterns' =>  $patterns
            ]);
           
    }
   
}
