<?php

namespace App\Http\Livewire\FrontEnd\OurCmp;

use Livewire\Component;

class PolicyComponent extends Component
{
   
    public function render()
    {
        return view('livewire.frontend.ourcmp.policy-component')->layout('layouts.base');
    }
}
