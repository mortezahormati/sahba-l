<?php

namespace App\Services\Notification\Providers;

use App\Services\Notification\Providers\Contracts\Provider;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class SmsProvider implements Provider
{

    private $phone_number;
    private $text;

    public function __construct($phone_number, String $text)
    {
        $this->phone_number = $phone_number;
        $this->text = $text;
    }

    public function send()
    {
        $client = new Client();
        $response = $client->post(config('services.sms.uri'), $this->prepareDataForSms());
        return $response->getBody();
    }


    private function prepareDataForSms()
    {

        $data = array_merge(
            config('services.sms.auth'),
            [

                'toNum' => $this->phone_number,
//                'message' => $this->text,
                "inputData" => [
                    [
                        "verification-code" => $this->text
                    ]
                ]]
        );

        return [
            'json' => $data
        ];
    }

//    private $phone_number;
//    private $text;
//
//    public function __construct($phone_number,string $text)
//    {
//        $this->phone_number = $phone_number;
//        $this->text = $text;
//    }
//    public function send()
//    {
//        $response = Http::post(config('services.sms.uri'), $this->prepareDataForSms());
//        return $response->body();
//    }
//    private function prepareDataForSms(){
////        dd($response->getBody());
//        $data = array_merge(
//            config('services.sms.auth') ,
//            [
//                'messages' => [
//                    [
//                        'sender' => env('SMS_NUMBER'),
//                        'recipient'=>$this->phone_number,
//                        'body' => $this->text
//                    ]
//                ],
//            ]
//        );
//        return $data;
//
//
//
//    }
}
