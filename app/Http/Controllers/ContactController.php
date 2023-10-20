<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ContactsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contacts() {
        $data = Contact::all();
        return view("contacts.contacts", ['data' => $data]);
    }

    public function import(){
        return view("contacts.import");
    }
    
    public function upload() 
    {
        Excel::import(new ContactsImport, request()->file('contact-file'));
               
        return back();
    }
}
