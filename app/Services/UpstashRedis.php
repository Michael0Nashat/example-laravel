<?php

namespace App\Services;

use GuzzleHttp\Client;

class UpstashRedis
{
    protected $client;
    protected $url;
    protected $token;

    public function __construct()
    {
        $this->url = rtrim(env('UPSTASH_REDIS_REST_URL'), '/');
        $this->token = env('UPSTASH_REDIS_REST_TOKEN');
        $this->client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
            ]
        ]);
    }

    public function set($key, $value)
    {
        return $this->call('SET', [$key, $value]);
    }

    public function get($key)
    {
        return $this->call('GET', [$key]);
    }

    protected function call($command, array $args = [])
    {
        $response = $this->client->post($this->url, [
            'json' => [
                'command' => $command,
                'args' => $args,
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
