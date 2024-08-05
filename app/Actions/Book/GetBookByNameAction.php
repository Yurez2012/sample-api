<?php

namespace App\Actions\Book;

use GuzzleHttp\Client;

class GetBookByNameAction
{
    public function handle($name)
    {
        $client = new Client();
        $apiKey = env('GOOGLE_API');

        $response = $client->get(env('GOOGLE_URL'), [
            'query' => [
                'q'            => $name,
                'key'          => $apiKey,
                'langRestrict' => 'uk|en',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
