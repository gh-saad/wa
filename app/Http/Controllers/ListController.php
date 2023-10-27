<?php

namespace App\Http\Controllers;

use App\Imports\ContactsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contact;
use App\Models\Lists;
use App\Models\ListContact;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Lists::all();
        return view("lists.lists",["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view("lists.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $uploadedFile = request()->file('contact-file');
        $fileName = $uploadedFile->getClientOriginalName();
        $list = Lists::create(['name' => $fileName]);
        Excel::import(new ContactsImport($list->id), $uploadedFile);
        // Update the total_contacts field in the Lists table
        $list->total_contacts = ListContact::where('list_id', $list->id)->count();
        $list->save();

        return redirect()->route('backend-lists')->with('success', "{$list->total_contacts} Records Imported Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Lists $lists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lists $lists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lists $lists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lists $lists)
    {
        //
    }

}
