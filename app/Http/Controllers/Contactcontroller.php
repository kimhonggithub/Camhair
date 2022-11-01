<?php

namespace App\Http\Controllers;

use App\Mail\ContactFromWebsite;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Contactcontroller extends Controller
{
    public $success;
    public function sendEmail(Request $req){
        $data =[
            'name' => 'unknown',
            'email' => $req->email,
            'message' => 'I am a new newsletter',
        ];
        Mail::to('ourmail@test.com')->send(new ContactFromWebsite('unknown Customer',$req->email,'I am a new newsletter'));
        return redirect()->route('shopping');
    }
}
