<?php

namespace App\Http\Livewire\FrontEnd\OurCmp;

use Livewire\Component;

class TermsComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.ourcmp.terms-component')->layout('layouts.base');
    }
}
