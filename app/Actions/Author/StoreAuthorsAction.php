<?php

namespace App\Actions\Author;

use App\Models\Author;

class StoreAuthorsAction
{
    public function handle($data)
    {
        $result = [];

        foreach ($data as $datum) {
            $author = Author::updateOrCreate([
                'full_name' => $datum,
            ]);

            $result[] = $author;
        }

        return $result;
    }
}
