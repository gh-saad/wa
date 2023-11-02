<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ContactsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contacts() {
        $data = Contact::where('status', '!=', '2')->orderByDesc('id')->get();
        return view("contacts.contacts", ['data' => $data]);
    }
}
