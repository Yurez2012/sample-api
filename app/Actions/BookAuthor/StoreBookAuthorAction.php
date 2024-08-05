<?php

namespace App\Actions\BookAuthor;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Arr;

class StoreBookAuthorAction
{
    public function handle($data)
    {
        $result = [];

        foreach ($data as $datum) {
            if ($datum['authors'] && $datum['description']) {
                foreach ($datum['authors'] as $author) {
                    $author = Author::updateOrCreate([
                        'full_name' => $author,
                    ]);
                }

                $book = Book::updateOrCreate(['google_id' => Arr::get($datum, 'google_id')], Arr::except($datum, 'authors'));
                $book->authors()->sync([$author->id], false);

                $result[] = $book;
            }
        }

        return $result;
    }
}
