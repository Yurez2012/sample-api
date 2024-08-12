<?php

namespace App\Http\Controllers\Friend;

use App\Actions\UserFriend\ParseStoreFriendAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFriend\UserFriendRequest;
use App\Repositories\UserRepository;

class FriendController extends Controller
{
    /**
     * @param UserFriendRequest $request
     * @param UserRepository    $repository
     *
     * @return array
     */
    public function index(UserFriendRequest $request, UserRepository $repository, ParseStoreFriendAction $parseStoreFriendAction)
    {
        $parseStoreFriendAction->handle($request->get('token'));

        $user = $repository->getUserById(auth()->user()->id, ['friends.user']);

        return [
            'friends' => $user->friends,
        ];
    }
}
