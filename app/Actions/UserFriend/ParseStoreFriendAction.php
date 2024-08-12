<?php

namespace App\Actions\UserFriend;

use App\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ParseStoreFriendAction
{
    public function handle($token)
    {
        $userRepository = app(UserRepository::class);

        $id = "122106740300460246";//auth()->user()->facebook_uuid
        $url = "https://graph.facebook.com/v20.0/".$id."/friends?access_token=" . $token.'&fields=id,name,picture,email';

        $response = Http::get($url);

        if ($response->successful()) {
            $items = $response->json();

            foreach (Arr::get($items, 'data', []) as $user) {
                $friend = $userRepository->getUserByFacebookUUID($user['id']);

                auth()->user()->friends()->sync([$friend->id], false);
            }
        }
    }
}
