<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminHomeSliderComponent extends AdminComponent
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $slider_image;
    
    public $showEditModal = false;
    public $sliderIdBeingRemoved = null;
    public $searchTerm = null;
    protected $queryString = ['searchTerm' => ['except' => '']];
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';
    protected $rules =[
        'title' => 'nullable',
        'subtitle' => 'required',
        'price' => 'required|nullable',
        'link' => 'required|nullable',
        'slider_image' => 'image|required'
    ];
 
    public function sortBy($columnName)
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }
    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function addNew(){
        $this->reset();
		$this->showEditModal = false;
		$this->dispatchBrowserEvent('show-form');
    }
    public function addSlider()
    {
        $this->validate();
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imagename = Carbon::now()->timestamp. '.' . $this->slider_image->extension();
        $this->slider_image -> storeAs('slider',$imagename);
        $slider->slider_image = $imagename;
        $slider->save();
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Add Slider successfully!']);
    }
    public function confirmsliderRemoval($feedback_id)
	{
		$this->feedbackIdBeingRemoved = $feedback_id;

		$this->dispatchBrowserEvent('show-delete-modal');
	}
    public function deleteslider()
	{
		$feedback = HomeSlider::findOrFail($this->feedbackIdBeingRemoved);
		$feedback->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'feedback deleted successfully!']);
	}
    public function render()
    {
        $sliders = HomeSlider::query()
    		->where('title', 'like', '%'.$this->searchTerm.'%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(5);
        return view('livewire.admin.pages.admin-home-slider-component',[
            'sliders' => $sliders
        ]);
    } 
}