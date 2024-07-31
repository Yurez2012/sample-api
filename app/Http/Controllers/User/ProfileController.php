<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    /**
     * @return ProfileResource
     */
    public function __invoke()
    {
        $user = auth()->user();

        return ProfileResource::make($user);
    }
}
