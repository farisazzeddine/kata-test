<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiCaller
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function callApi($url, $method = 'GET', $data = [])
    {
        $response = $this->client->request($method, $url, [
            'json' => $data,
        ]);

        return $response->getContent();
    }
}