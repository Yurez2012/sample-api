<?php

namespace App\Actions\BookAuthor;

use App\Models\Book;
use App\Models\Collection;

class StoreCollectionAction
{
    public function handle($id, $type)
    {
        if ($type == 'book') {
            Collection::updateOrCreate([
                'model_type' => Book::class,
                'model_id'   => $id,
            ]);
        }
    }
}
