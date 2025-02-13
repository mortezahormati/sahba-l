<?php

namespace App\Services\Notification\Providers;

use App\Models\User;
use App\Services\Notification\Providers\Contracts\Provider;
use GuzzleHttp\Client;

class CustomProvider implements Provider
{
    private $user;
    private $text;

    public function __construct(User $user, String $text)
    {
        $this->user = $user;
        $this->text = $text;
    }

    public function send()
    {
        $client = new Client();
        $response = $client->post(config('services.smsCustom.uri'), $this->prepareDataForSms());
        return $response->getBody();
    }


    private function prepareDataForSms()
    {

        $data = array_merge(
            config('services.smsCustom.auth'),
                [
                "message" => $this->text,
                "to" => [$this->user->phone_number],
                "time" =>""
                ]
        );



        return [
            'json' => $data
        ];
    }
}
