<?php

namespace App\Actions\Book;

use Illuminate\Support\Arr;

class GetBookTitleFromGoogleApiAction
{
    public function handle($data)
    {
        $result = [];


        foreach (Arr::get($data, 'items', []) as $book) {
            if(Arr::get($book, 'volumeInfo.language') == 'uk' || Arr::get($book, 'volumeInfo.language') == 'en') {
                $result[] = [
                    'google_id'    => Arr::get($book, 'id'),
                    'authors'      => Arr::get($book, 'volumeInfo.authors'),
                    'title'        => Arr::get($book, 'volumeInfo.title'),
                    'description'  => Arr::get($book, 'volumeInfo.description'),
                    'original_url' => Arr::get($book, 'volumeInfo.previewLink'),
                    'url'          => Arr::get($book, 'volumeInfo.imageLinks.thumbnail'),
                ];
            }
        }

        return $result;
    }
}
