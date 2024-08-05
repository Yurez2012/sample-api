<?php

namespace App\Repositories;

use App\Models\Collection;

class CollectionRepository extends Repository
{

    /**
     * @var
     */
    public $model;

    /**
     * @param Collection $model
     */
    public function __construct(Collection $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $id
     * @param $relation
     *
     * @return mixed
     */
    public function getCollectionByUserId($id, $relation = [])
    {
        return $this->model
            ->with($relation)
            ->where('user_id', $id)
            ->get();
    }
}
