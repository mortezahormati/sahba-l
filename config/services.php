<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'sms' =>[
        'auth'=>[
            'op' => "pattern",
            'user' => env('SMS_USER'),
            'pass' => env('SMS_PASS'),
            'fromNum' => env('SMS_NUMBER'),
            'patternCode' => "hcot4ng6dacjr4l",

        ],
        'uri' => env('SMS_API_LINK')
    ],
    'smsCustom' =>[
        'auth' => [
            "op" => "send",
            "uname" => env('SMS_USER'),
            "pass" => env('SMS_PASS'),
            "from" => env('SMS_NUMBER'),

        ],
        'uri' => env('SMS_API_LINK')
    ],
    'recaptcha' => [
        'site_key' => env('RECAPTCHA_SITE_KEY'),
        'secret_key' => env('RECAPTCHA_SECRET_KEY')
    ],
    'paginate' => [
        'table' => 5 ,
        '10-t' => 10 ,
        '20-t' => 10 ,
    ]



];
