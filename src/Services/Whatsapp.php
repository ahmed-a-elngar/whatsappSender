<?php

namespace Elngar\Whatsapp\Services;

use Illuminate\Support\Facades\Http;

class Whatsapp
{
    static protected array $data;
    static protected mixed $result;

    static public function send( string $receiver, string $content)
    {
        self::prepareData($receiver, $content);

        return self::sendWithResponse();
    }

    static protected function prepareData($receiver, $content) :void
    {
        self::$data= [
            "messaging_product"     =>      "whatsapp",
            "to"                    =>      $receiver,
            "type"                  =>      "text",
            "text"              =>      json_encode([ 'body' => $content])
        ];

    }

    static protected function getUrl() :string
    {
        return "https://graph.facebook.com/v15.0/". config('whatsapp.phone_number_id') ."/messages";
    }

    static protected function sendWithResponse() :bool
    {
        self::$result = Http::withHeaders([
            'Accept'            =>      'application/json',
            'Content-Type'      =>      'application/json',
            'Authorization'     =>      'Bearer ' . config('whatsapp.access_token')
        ])->post(self::getUrl(), self::$data);

        return self::$result->successful();
    }

    static public function getSendResult()
    {
        return self::$result->successful() ? json_decode( self::$result->body() )->messages : json_decode( self::$result->body() )->error->message;
    }

}
