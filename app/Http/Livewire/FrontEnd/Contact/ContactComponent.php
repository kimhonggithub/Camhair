<?php

namespace App\Http\Livewire\FrontEnd\Contact;

use App\Mail\ContactFromWebsite;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithPagination;
use Mail;

class ContactComponent extends Component
{

    public $name;
    public $email;
    public $message;
    public $success;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required|min:5',
    ];
    public function contactFormSubmit()
    {
        $this->validate();
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
        Mail::to('ourmail@test.com')->send(new ContactFromWebsite($this->name,$this->email,$this->message));
        // $this->name = '';
        // $this->email='';
        // $this->message='';
        $this->reset(['name','email','message']);
        $this->success= 'your in quiry has been submitted sucessfully';
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'User Created Successfully!']);
    }
    private function update($field)
    {
        $this->validateOnly($field);
    }
    public function render()
    {
        
        return view('livewire.frontend.contact.contact-component')->layout('layouts.base');
    }
}
