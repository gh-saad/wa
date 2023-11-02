<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\TwilioController;
use App\Models\Campaign;
use App\Models\Template;
use App\Models\Contact;
use App\Models\Lists;
use App\Models\ListContact;
use App\Models\Blacklist;
use App\Models\Number;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Campaign::select('campaigns.*','templates.name as t_name', 'lists.name as l_name')
        ->join('templates', 'campaigns.template_id', '=', 'templates.id')
        ->join("lists","campaigns.list_id", "=", "lists.id")
        ->orderByDesc('id')
        ->get();
        return view("campaigns.campaigns",["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = Template::where('status', 1)->get();
        $numbers = Number::all();
        $lists = Lists::where('total_contacts', '>', 0)->get();
        return view("campaigns.create",[
            'templates' => $templates,
            'lists' => $lists,
            'numbers' => $numbers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'name' => 'required|max:15',
        //     'num_id' => 'required',
        //     'template_id' => 'required',
        //     'list_id' => 'required',
        //     'schedule_time'=> 'required'
        // ]);
        $data = [
            'name' => $request->get('name'),
            'area' => $request->get('area'),
            'num_id' => $request->get('num_id'),
            'template_id' => $request->get('template_id'),
            'list_id' => $request->get('list_id'),
            'schedule_time'=> $request->get('schedule_time')
        ];
        // dd($data);
        Campaign::create($data);

        return redirect()->route('backend-campaigns')->with('success', 'User created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {


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

    public function run(Campaign $campaign){
        $twilio = new TwilioController();

        $listContacts = ListContact::select('list_contact.*', 'contacts.name', 'contacts.number')->join('contacts', 'list_contact.contact_id', '=','contacts.id')
        ->where('list_id', $campaign->list_id)
        ->whereIn('contacts.status',[0,1])
        ->get();

        $blacklist = Blacklist::select('number')->get();
        $blacklist = $blacklist->toArray();
        $blacklistNumbers = array_column($blacklist, 'number');

        $template = Template::find($campaign->template_id);
        $number = Number::find($campaign->num_id);
        $number_id = $number->id;

        foreach($listContacts as $contant){
            if (in_array($contant['number'], $blacklistNumbers)) {
                continue;
            }
            // print_r($conversation_data);
            $conversation = Conversation::where('contact_id', $contant->contact_id)
            ->where('num_id',$number_id)->first();
            if ($conversation == null){
                $conversation = Conversation::create([
                    'contact_id' => $contant->contact_id,
                    'num_id' => $number_id,
                    "status" => 0,
                ]);
            }
            $conversation_id = $conversation->id;

            // echo '<br>';
            // echo 'Numbmer From: +'.$contant['number'].'<br>';
            // echo 'Numbmer to: +'.$number['number'].'<br>';
            // echo 'Template: '.$template['body'].'<br>';
            // echo 'Conversation id: '.$conversation_id.'<br>';
            $body = str_replace('{{1}}',$contant['name'], $template['body']);
            $body = str_replace('{{2}}',$campaign->area, $body);
            $message_data = [
                "conversation_id" => $conversation_id,
                "from" => $number['number'],
                "to" => $contant['number'],
                "content" => $body,
            ];
            // print_r($message_data);
            $message = Message::create($message_data);
            if($message){
                if (App::environment('production')) {
                    $sid = $twilio->sendMessage($number['number'], $contant['number'], $body);
                    if($sid){
                        $message->message_sid = $sid;
                        $message->save();
                    }
                }
            }
        }
        $campaign->status = 1;
        $campaign->save();
        return redirect(route('backend-campaigns'));
    }
}
