<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $slider_image;
    public $new_slider_image;
    public $slider_id;
    public function mount($slider_id)
    {
        $slider = HomeSlider::find($slider_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->slider_image = $slider->slider_image;
        $this->slider_id = $slider->id;
    }
    public function editSlide()
    {
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        if($this->new_slider_image)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->new_slider_image->extension();
            $this->new_slider_image->storeAs('slider',$imageName);
            $slider->slider_image = $imageName;
        }
        $slider->save();
        session()->flash('msg','Slider edited successfully');
        return redirect()->route('admin.slider');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
