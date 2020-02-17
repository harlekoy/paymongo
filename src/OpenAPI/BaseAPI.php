<?php

namespace Harlekoy\Paymongo\OpenAPI;

use GuzzleHttp\Client;

class BaseAPI
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    public function __construct()
    {
        $this->initHttpClient();
    }

    /**
     * Initialize HTTP Client.
     *
     * @return void
     */
    protected function initHttpClient()
    {
        $this->client = new Client([
            'base_uri' => env('PAYMONGO_API_URL', 'https://api.paymongo.com/v1/'),
        ]);
    }

    /**
     * Handle the KYC API request.
     *
     * @param  string $method
     * @param  string $path
     *
     * @return array
     */
    public function request($method, $path, $data = null)
    {
        $content = $this->client->request($method, $path, [
            'json'    => $data,
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Basic '.base64_encode(env('PAYMONGO_SECRET')),
            ],
        ])->getBody()->getContents();

        return json_decode($content, true);
    }
}
