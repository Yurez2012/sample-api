<?php

namespace App\Actions\Book;

use Illuminate\Support\Arr;

class GetBookTitleFromGoogleApiAction
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
