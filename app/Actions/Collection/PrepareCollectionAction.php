<?php

namespace App\Actions\Collection;

use App\Models\Book;
use App\Models\Collection;

class PrepareCollectionAction
{
    public function handle($data)
    {
        $result = [];

        foreach ($data as $key => $collections) {
            $result = [
                'title'       => $key,
                'collections' => $collections,
            ];
        }

        return $result;
    }
}
