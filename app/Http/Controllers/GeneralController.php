<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller{
    public function logOut(){
        Auth::logout();
        
        return redirect()->route('home');
    }
}
