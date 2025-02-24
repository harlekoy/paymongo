<?php

namespace Harlekoy\Paymongo\OpenAPI;

use GuzzleHttp\Client;
use Harlekoy\Paymongo\Http\Response;

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
                'Authorization' => 'Basic '.base64_encode($this->accessKey()),
            ],
        ])->getBody()->getContents();

        return new Response($this, json_decode($content, true));
    }

    /**
     * Get access key.
     *
     * @return string
     */
    public function accessKey()
    {
        return config('paymongo.secret_key');
    }

    /**
     * Prepare payload.
     *
     * @param  array $data
     * @return array
     */
    public function payload($data)
    {
        if (Arr::has($data, 'amount')) {
            $data['amount'] = intval(floor(Arr::get($data, 'amount', 0) * 100));
        }

        return $data;
    }
}
