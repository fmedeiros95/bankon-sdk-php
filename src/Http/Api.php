<?php

namespace BankOn\Http;

use GuzzleHttp\Client;

class Api
{
    const GET = 'GET';
    const POST = 'POST';

    private function __construct()
    { }

    public static function getGuzzleHttpClient()
    {

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => Endpoint::BASE_URL,
        ]);

        return $client;
    }
}
