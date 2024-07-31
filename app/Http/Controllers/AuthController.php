<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use App\Services\UserService;

class AuthController extends Controller
{
    public function store
    (
        LoginRequest   $request,
        UserService    $userService,
        UserRepository $userRepository
    )
    {
        $facebookUUID = $request->get('facebook_uuid');

        $user = $userRepository->getUserByFacebookUUID($facebookUUID);

        if (!$user) {
            $user = $userService->create($request->validated());
        }

        return [
            'api_token' =>  $user->createToken('Token Name')->accessToken
        ];
    }
}
