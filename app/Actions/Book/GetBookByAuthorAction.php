<?php

namespace App\Actions\Book;

use GuzzleHttp\Client;

class GetBookByAuthorAction
{
    public function handle($author)
    {
        $client = new Client();
        $apiKey = env('GOOGLE_API');

        $response = $client->get(env('GOOGLE_URL'), [
            'query' => [
                'q' => 'inauthor:' . $author,
                'key' => $apiKey,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
