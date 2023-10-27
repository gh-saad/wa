<?php

namespace App\Http\Controllers;
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
        $conversations = Conversation::select('conversations.*', 'contacts.name', 'contacts.number')
        ->join("contacts","conversations.contact_id", "=", "contacts.id")->get();

        return view("inbox.inbox",[
            "conversations" => $conversations
        ]);
    }

    public function show(Conversation $conversation)
    {
        $conversations = Conversation::select('conversations.*', 'contacts.name', 'contacts.number')
        ->join("contacts","conversations.contact_id", "=", "contacts.id")->get();
        $contact = Contact::find($conversation->contact_id);

        $messages = Message::where('conversation_id', $conversation->id)->orderBy('created_at')->get();
        return view("inbox.show",[
            "conversations" => $conversations,
            "conversation" => $conversation,
            "contact" => $contact,
            "messages" => $messages
        ]);
    }

    public function create(Request $request, Conversation $conversation) {

        $contact = Contact::find($conversation->contact_id);
        $number = Number::find($conversation->num_id);

        $blacklist = Blacklist::where('number',$contact['number'])->get();
        if($blacklist){
            $conversation->status = 2;
            $conversation->save();
            return redirect()->route('backend-inbox-show',$conversation->id)->with('This Conversation in blocked');
        }
        $message_data = [
            "conversation_id" => $conversation->id,
            "from" => $number['number'],
            "to" => $contact['number'],
            "content" => $request->get('body'),
        ];
        if(Message::create($message_data)){
            if (App::environment('production')) {
                $twilio->sendMessage($number['number'], $contant['number'], $request->get('body'));
            }
        }
        return redirect()->route('backend-inbox-show',$conversation->id);
    }
}