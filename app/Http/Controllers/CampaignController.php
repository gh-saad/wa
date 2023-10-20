<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TwilioController;
use App\Models\Campaign;
use App\Models\Template;
use App\Models\Contact;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Campaign::all();
        return view("campaigns.campaigns",["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = Template::all();
        return view("campaigns.create",['templates'=>$templates]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
    }

    public function run(){
        $twilio = new TwilioController();
        $id = 1;
        $contants = Contact::all();
        $template = Template::where('id', $id)->first();
        foreach($contants as $contant){
            echo $twilio->sendMessage($contant['number'], $template['body']);
        }
        //return redirect(route('backend-campaigns'));
    }
}
