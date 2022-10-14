<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeContoller extends Controller
{
    public function checkUserType(){
        //if u have not log
        if(!Auth::user()){
            return redirect()->route('login');
        }
        else if(Auth::user()->usertype === 'ADM') {
            return redirect()->route('admin.dashboard');
        }
        
    }
 
}
