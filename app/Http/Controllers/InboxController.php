<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TwilioController;
use Illuminate\Support\Facades\App;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Contact;
use App\Models\Number;
use App\Models\Blacklist;

use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index()
    {
        $conversations = Conversation::select('conversations.*', 'contacts.name', 'contacts.number', 'contacts.wa_name')
        ->join("contacts","conversations.contact_id", "=", "contacts.id")
        ->where('conversations.status', 1)
        ->orderBy('updated_at')
        ->get();

        return view("inbox.inbox",[
            "conversations" => $conversations
        ]);
    }

    public function send_list()
    {
        $conversations = Conversation::select('conversations.*', 'contacts.name', 'contacts.number', 'contacts.wa_name')
        ->join("contacts","conversations.contact_id", "=", "contacts.id")
        ->where('conversations.status', 0)
        ->orderBy('updated_at')
        ->get();

        return view("inbox.inbox",[
            "conversations" => $conversations
        ]);
    }

    public function show(Conversation $conversation)
    {
        if($conversation->status == 1){
            $conversations = Conversation::select('conversations.*', 'contacts.name', 'contacts.number', 'contacts.wa_name')
            ->join("contacts","conversations.contact_id", "=", "contacts.id")
            ->where('conversations.status', 1)
            ->orderBy('updated_at')
            ->get();
            $contact = Contact::find($conversation->contact_id);

            $messages = Message::where('conversation_id', $conversation->id)->orderBy('created_at')->get();
            return view("inbox.show",[
                "conversations" => $conversations,
                "conversation" => $conversation,
                "contact" => $contact,
                "messages" => $messages
            ]);
        }else{
            return redirect()->route('backend-inbox');
        }
    }

    public function send_show(Conversation $conversation)
    {
        if($conversation->status == 0){
            $conversations = Conversation::select('conversations.*', 'contacts.name', 'contacts.number', 'contacts.wa_name')
            ->join("contacts","conversations.contact_id", "=", "contacts.id")
            ->where('conversations.status', 0)
            ->orderBy('updated_at')
            ->get();
            $contact = Contact::find($conversation->contact_id);

            $messages = Message::where('conversation_id', $conversation->id)->orderBy('created_at')->get();
            return view("inbox.show",[
                "conversations" => $conversations,
                "conversation" => $conversation,
                "contact" => $contact,
                "messages" => $messages
            ]);
        }else{
            return redirect()->route('backend-inbox');
        }
    }

    public function create(Request $request, Conversation $conversation) {
        $twilio = new TwilioController();

        $contact = Contact::find($conversation->contact_id);
        $number = Number::find($conversation->num_id);

        $blacklist = Blacklist::where('number',$contact['number'])->first();
        if($blacklist){
            $conversation->status = 2;
            $conversation->save();
            return redirect()->route('backend-inbox')->with('This Conversation in blocked');
        }
        $message_data = [
            "conversation_id" => $conversation->id,
            "from" => $number['number'],
            "to" => $contact['number'],
            "content" => $request->get('body'),
        ];
        $message = Message::create($message_data);
        if($message){
            if (App::environment('production')) {
                $sid = $twilio->sendMessage($number['number'], $contact['number'], $request->get('body'));
                if($sid){
                    $message->message_sid = $sid;
                    $message->save();
                }
            }
        }
        return redirect()->route('backend-inbox-show',$conversation->id);
    }
}
