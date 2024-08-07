<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{

    /**
     * @var
     */
    public $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string|null $facebokUUID
     *
     * @return mixed
     */
    public function getUserByFacebookUUID(string|null $facebokUUID)
    {
        return $this->model
            ->where('facebook_uuid', $facebokUUID)
            ->first();
    }

    /**
     * @param $id
     * @param $relation
     *
     * @return mixed
     */
    public function getUserById($id, $relation = [])
    {
        return $this->model
            ->with($relation)
            ->where('id', $id)
            ->first();
    }
}
