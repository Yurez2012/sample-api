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
     * @param $relation
     *
     * @return mixed
     */
    public function getAllCollection($relation = [])
    {
        return $this->model
            ->with($relation)
            ->orderBy('id', 'desc')
            ->get();
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
            ->orderBy('rating', 'desc')
            ->get();
    }

    /**
     * @param $category
     * @param $relation
     *
     * @return mixed
     */
    public function getCollectionByCategory($category, $relation = [])
    {
        return $this->model
            ->with($relation)
            ->where('user_id', auth()->user()->id)
            ->where('model_type', $category)
            ->orderBy('rating', 'desc')
            ->get();
    }
}
