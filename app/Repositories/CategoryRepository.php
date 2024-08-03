<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository
{

    /**
     * @var
     */
    public $model;

    /**
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getAllCategory()
    {
        return $this->model->get();
    }
}
