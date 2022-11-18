<?php

namespace App\Http\Livewire\Admin\Pages;
use App\Models\FeedbackSlides;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Http\Livewire\Admin\AdminComponent;
class AdminFeedbacksComponent extends AdminComponent
{
    use WithFileUploads;
    public $showEditModal = false;
    public $title;
    public $slider_image;
    public $feedbackIdBeingRemoved = null;
    public $searchTerm = null;
    protected $queryString = ['searchTerm' => ['except' => '']];
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';
    protected $rules =[
        'title' => 'nullable',
        'slider_image' => 'required'
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
    public function addFeedback()
    {
        $this->validate();
        $feedabck = new FeedbackSlides();
        $feedabck->title = $this->title;
        $imagename = Carbon::now()->timestamp. '.' . $this->slider_image->extension();
        $this->slider_image -> storeAs('feedback',$imagename);
        $feedabck->slider_image = $imagename;
        $feedabck->save();
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Add feedback successfully!']);
    }
    public function confirmfeedbackRemoval($feedback_id)
	{
		$this->feedbackIdBeingRemoved = $feedback_id;

		$this->dispatchBrowserEvent('show-delete-modal');
	}
    public function deletefeedback()
	{
		$feedback = FeedbackSlides::findOrFail($this->feedbackIdBeingRemoved);
		$feedback->delete();

		$this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'feedback deleted successfully!']);
	}
    public function render()
    {
        
        $feedbacks = FeedbackSlides::query()
    		->where('title', 'like', '%'.$this->searchTerm.'%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(5);
        return view('livewire.admin.pages.admin-feedbacks-component',[
            'feedbacks' => $feedbacks,
        ]);
    }
}
