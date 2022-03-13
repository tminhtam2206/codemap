<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller{
    public static function add(Request $request){
        $contact = new Contact();
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
    }

    public static function getAll(){
        return Contact::orderby('created_at', 'desc')->get();
    }
}
