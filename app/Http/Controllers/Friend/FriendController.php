<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class FriendController extends Controller
{
    /**
     * @param UserRepository $repository
     *
     * @return array
     */
    public function index(UserRepository $repository)
    {
        $user = $repository->getUserById(auth()->user()->id, ['friends.user']);

        return [
            'friends' => $user->friends,
        ];
    }
}
