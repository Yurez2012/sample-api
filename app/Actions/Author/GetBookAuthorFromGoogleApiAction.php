<?php

namespace App\Actions\Author;

use Illuminate\Support\Arr;

class GetBookAuthorFromGoogleApiAction
{
    public function handle($data)
    {
        $result = [];

        foreach (Arr::get($data, 'items', []) as $book) {
            foreach (Arr::get($book, 'volumeInfo.authors') as $author) {
                $result[] = $author;
            }
        }

        return array_unique($result);
    }
}
