<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Contact;
use App\Models\Number;
use App\Models\Blacklist;
class TwilioController extends Controller
{
    /*
    // 201 - CREATED - The request was successful. We created a new resource and the response body contains the representation.
    {
        "body": "Your Yummy Cupcakes Company order of 1 dozen frosted cupcakes has shipped and should be delivered on July 10, 2019. Details: http://www.yummycupcakes.com/",
        "num_segments": "1",
        "direction": "outbound-api",
        "from": "whatsapp:+14155238886",
        "date_updated": "Fri, 20 Oct 2023 10:32:59 +0000",
        "price": null,
        "error_message": null,
        "uri": "/2010-04-01/Accounts/AC62099310940b0b5a6a80d5698f4d28fa/Messages/SM18d610229c8bd753769093e9e878d459.json",
        "account_sid": "AC62099310940b0b5a6a80d5698f4d28fa",
        "num_media": "0",
        "to": "whatsapp:+923102049956",
        "date_created": "Fri, 20 Oct 2023 10:32:59 +0000",
        "status": "queued",
        "sid": "SM18d610229c8bd753769093e9e878d459",
        "date_sent": null,
        "messaging_service_sid": null,
        "error_code": null,
        "price_unit": null,
        "api_version": "2010-04-01",
        "subresource_uris": {
        "media": "/2010-04-01/Accounts/AC62099310940b0b5a6a80d5698f4d28fa/Messages/SM18d610229c8bd753769093e9e878d459/Media.json"
        }
    }
  */
    public function sendMessage($from, $to, $body)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages->create(
            "whatsapp:+$to", // to
            [
                "from" => "whatsapp:+$from",
                "body" => $body
            ]
        );

        return $message->sid;
    }

    public function incoming(Request $request)
    {
        $from = str_replace("whatsapp:+","",$request->get('From'));
        $to = str_replace("whatsapp:+","",$request->get('To'));
        $wa_name = $request->get('ProfileName');
        $wa_latitude = $request->get('Latitude');
        $wa_longitude = $request->get('Longitude');
        $message_sid = $request->get('SmsMessageSid');
        $body = $request->get('Body');

        $contact = Contact::where('number', $from)->first();
        $number = Number::where('number', $to)->first();

        if($contact == null){
            $contact = Contact::create([
                "name" => null,
                "number" => $from,
                "status" => 0
            ]);
        }

        $conversation = Conversation::where(['num_id'=> $number->id, 'contact_id' => $contact->id])->first();
        if($conversation == null){
            $conversation = Conversation::create([
                'num_id'=> $number->id,
                'contact_id' => $contact->id,
                'status' => 1
            ]);
        }

        $input_data = [
            'conversation_id' => $conversation->id,
            'message_sid'=>$message_sid,
            'from' => $from,
            'to' => $to,
            'content' => $body,
            'latitude' => $wa_latitude,
            'longitude' => $wa_longitude,
        ];

        // Check Blacklist word and make conversation
        $body = strtolower($body);
        $blacklist_word = ['no'];

        $conversation->status = 1;
        foreach ($blacklist_word as $word) {
            if ($body === $word) {
                $contact->status = 2;
                $conversation->status = 2;
                Blacklist::create(['number' => $from]);
                break;
            }
        }
        $conversation->save();

        Message::create($input_data);

        // Update wa profile name in contact
        if($contact->wa_name == null){
            $contact->wa_name = $wa_name;
            $contact->save();
        }else{
            $contact->save();
        }

        $res = '<?xml version="1.0" encoding="UTF-8" ?><Response></Response>';
        // return response($res, 200)->header('Content-Type', 'text/xml, application/xml, text/html');
        return response("",200);
    }

    public function status(Request $request)
    {
        $from = str_replace("whatsapp:+","",$request->get('From'));
        $to = str_replace("whatsapp:+","",$request->get('To'));
        $message_sid = $request->get('MessageSid');
        $status =   $request->get('SmsStatus');
        // queued , sent, delivered, read, failed
        if($status == 'queued'){
            $status = 0;
        }else if($status == 'sent'){
            $status = 1;
        }else if($status == 'delivered'){
            $status = 2;
        }else if($status == 'read'){
            $status = 3;
        }else{
            $status = 4;
        }

        $data = [
            'from'=> $from,
            'to' => $to,
            'message_sid' => $message_sid
        ];
        $message = Message::where($data)->first();
        if($message){
            $message->status = $status;
            $message->save();
        }

        $res = '<?xml version="1.0" encoding="UTF-8" ?><Response></Response>';
        return response("", 200); //->header('Content-Type', 'text/xml, application/xml, text/html');
    }
}
