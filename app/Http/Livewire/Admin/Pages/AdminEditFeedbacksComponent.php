<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\FeedbackSlides;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
class AdminEditFeedbacksComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $slider_image;
    public $new_slider_image;
    public $feedback_id;
    public function mount($feedback_id)
    {
        $feedback = FeedbackSlides::find($feedback_id);
        $this->title = $feedback->title;
        $this->slider_image = $feedback->slider_image;
        $this->slider_id = $feedback->id;
    }
    public function editFeedback()
    {
        $feedback = FeedbackSlides::find($this->slider_id);
        $feedback->title = $this->title;
        if($this->new_slider_image)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->new_slider_image->extension();
            $this->new_slider_image->storeAs('feedback',$imageName);
            $feedback->slider_image = $imageName;
        }
        $feedback->save();
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Feedback updated successfully!']);
		return redirect()->route('admin.feedback');
    }
    public function render()
    {
        $feedbacks = FeedbackSlides::all();
        return view('livewire.admin.pages.admin-edit-feedbacks-component',[
            'feedbacks' => $feedbacks,
        ]);
    }
}
