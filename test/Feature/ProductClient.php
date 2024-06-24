<?php

namespace HyperfTest\Feature;

use Hyperf\Testing\Client;
use Psr\Http\Message\ResponseInterface;
use function Hyperf\Support\make;

class ProductClient
{
    private $client;

    public function __construct()
    {
        $this->client = make(Client::class);
    }

    public function createRequest(array $attributes): ResponseInterface
    {
        $uri = '/product/Create';
        $response = $this->client->request('POST', $uri, [
            'json' => $attributes,
            'headers' => ['Content-Type' => 'application/json'],
        ]);

        return $response;
    }

    public function listRequest($attributes): ResponseInterface
    {
        $uri = '/product/List';
        $response = $this->client->request('GET', $uri, [
            'json' => $attributes,
            'headers' => ['Content-Type' => 'application/json'],
        ]);

        return $response;
    }

    public function getRequest($attributes): ResponseInterface
    {
        $uri = '/product/';
        $response = $this->client->request('POST', $uri, [
            'json' => $attributes,
            'headers' => ['Content-Type' => 'application/json'],
        ]);

        return $response;
    }

    public function deleteRequest($attributes): ResponseInterface
    {
        $uri = '/product/Delete';
        $response = $this->client->request('POST', $uri, [
            'json' => $attributes,
            'headers' => ['Content-Type' => 'application/json'],
        ]);

        return $response;
    }

    public function updateRequest($attributes): ResponseInterface
    {
        $uri = '/product/Update';
        $response = $this->client->request('POST', $uri, [
            'json' => $attributes,
            'headers' => ['Content-Type' => 'application/json'],
        ]);

        return $response;
    }
}
