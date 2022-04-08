<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class testController extends Controller
{
    public function gettest()
    {
        $client = new Client(['debug' => false, 'exceptions' => false]);
        $promise = $client->request('POST', config('sms.url'), [
            'auth' => [
                'makro',
                '4M2shT92tH'
            ],
            'json' => [
                'messages' => [
                    [
                        'recipient' => "+998909824891",
                        'message-id' => 'makro' . uniqid(),
                        'sms' => [
                            'originator' => 'Makro',
                            'content' => [
                                'text' => "STROVO"
                            ]
                        ]
                    ]
                ]
            ],
            'headers' => [
                'Content-Type' => 'application/json;charset=UTF-8',
            ]
        ]);
    }

    public function alpha()
    {
        $client = new Client(['base_uri' => 'http://91.204.239.44/broker-api/']);
        $res = $client->request('POST', 'send', [
            'auth' => ['makro', '4M2shT92tH'],
            'json' => [
                'messages' => [
                    [
                        'recipient' => "+998909824891",
                        'message-id' => 'makro',
                        'sms' => [
                            'originator' => 'Makro',
                            'content' => [
                                'text' => "STROVO"
                            ]
                        ]
                    ]
                ],
            ],
            'headers' => [
                'Content-Type' => 'application/json;charset=UTF-8',
            ]
        ]);
        dd($res);
    }
}
