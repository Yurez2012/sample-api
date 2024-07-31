<?php

namespace App\Repositories;

class Repository {

    /**
     * @var
     */
    public $model;

    /**
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }
}
