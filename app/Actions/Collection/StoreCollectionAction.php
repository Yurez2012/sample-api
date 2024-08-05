<?php

namespace App\Actions\Collection;

use App\Models\Book;
use App\Models\Collection;

class StoreCollectionAction
{
    public function handle($id, $type)
    {
        if ($type == 'Book' || $type == 'book') {
            Collection::updateOrCreate([
                'user_id'    => auth()->user()->id,
                'model_type' => Book::class,
                'model_id'   => $id,
            ]);
        }
    }
}
