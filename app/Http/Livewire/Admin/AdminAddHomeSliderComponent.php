<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $slider_image;
    public function addSlider()
    {
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imagename = Carbon::now()->timestamp. '.' . $this->slider_image->extension();
        $this->slider_image -> storeAs('slider',$imagename);
        $slider->slider_image = $imagename;
        $slider->save();
        session()->flash('msg','Slider added successfully');
        return redirect()->route('admin.slider');

    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
