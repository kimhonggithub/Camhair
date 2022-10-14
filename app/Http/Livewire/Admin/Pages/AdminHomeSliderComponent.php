<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($id)
    {
        $slider = HomeSlider::find($id);
        $slider->delete();
        session()->flash('msg','Slider deleted successfully');
        return redirect()->route('admin.slider');
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.pages.admin-home-slider-component',['sliders' => $sliders]);
    }
}
