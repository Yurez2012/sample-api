<?php

namespace App\Actions\Author;

use Illuminate\Support\Arr;

class GetBookAuthorFromGoogleApiAction
{
    public function handle($data)
    {
        $result = [];

        foreach (Arr::get($data, 'items', []) as $book) {
            $result[] = [
                'google_id'   => Arr::get($book, 'id'),
                'title'        => Arr::get($book, 'volumeInfo.title'),
                'description'  => Arr::get($book, 'volumeInfo.description'),
                'original_url' => Arr::get($book, 'volumeInfo.previewLink'),
                'url'          => Arr::get($book, 'volumeInfo.imageLinks.thumbnail'),
            ];
        }

        return $result;
    }
}
