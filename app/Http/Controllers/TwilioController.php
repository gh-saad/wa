<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

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
    public function sendMessage($to, $body)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages->create(
            "whatsapp:+$to", // to
            [
                "from" => "whatsapp:+14155238886",
                "body" => $body
            ]
        );

        return $message->sid;
    }
}
