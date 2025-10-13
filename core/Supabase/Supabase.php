<?php
namespace Core\Supabase;

use GuzzleHttp\Client;

class Supabase
{
    private object $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost:8000/rest/v1/',
            'headers' => [
                'apikey' => $_ENV['SUPABASE_KEY'],
                'Authorization' => 'Bearer ' . $_ENV['SUPABASE_AUTHORIZATION'],
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
        ]);
    }

    public function get()
    {
        $response = $this->client->get('users', [
            'query' => [
                'select' => '*',
                'id' => 'eq.1' // exemplo de filtro
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public function add(string $tabela, array $data = [])
    {
        $response = $this->client->post($tabela, [
            'json' => $data
        ]);

        $response->getBody();

    }
}