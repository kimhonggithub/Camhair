<?php

namespace App\Http\Livewire\FrontEnd\Blog;

use App\Models\FeedbackSlides;
use Livewire\Component;

class FeedbackComponent extends Component
{
    public function render()
    {
        $feedbacks = FeedbackSlides::all();
        return view('livewire.frontend.blog.feedback-component',[
            'feedbacks' => $feedbacks,
        ])->layout('layouts.base');
    }
}
