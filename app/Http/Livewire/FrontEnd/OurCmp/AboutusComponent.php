<?php

namespace App\Http\Livewire\FrontEnd\OurCmp;

use Livewire\Component;

class AboutusComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.ourcmp.aboutus-component')->layout('layouts.base');
    }
}
