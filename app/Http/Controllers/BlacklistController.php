<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BlacklistImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Blacklist;

class BlacklistController extends Controller
{
    public function blacklist() {
        $data = Blacklist::all();
        return view("blacklist.blacklist", ['data' => $data]);
    }

    public function create(){
        return view("blacklist.create");
    }

    public function store()
    {
        Excel::import(new BlacklistImport, request()->file('contact-file'));

        return redirect()->route('backend-blacklist')->with('success', "Blacklist Imported Successfully!");
    }
}
