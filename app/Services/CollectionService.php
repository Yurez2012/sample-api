<?php

namespace App\Services;

use App\Models\User;

class CollectionService {
    /**
     * @param       $collection
     * @param array $data
     *
     * @return mixed
     */
    public function update($collection, array $data)
    {
        return $collection->update($data);
    }
}
