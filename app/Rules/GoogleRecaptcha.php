<?php

namespace App\Rules;

use http\Client;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class GoogleRecaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://google.com/recaptcha/api/'
        ]);


//        $client = Http::get('https://www.google.com/recaptcha/api/');
        $response = $client->post('siteverify',[
            'query' => [
                'secret' => config('services.recaptcha.secret_key'),
                'response' =>$value
            ]
        ]);
        return json_decode($response->getBody())->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
