<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\CollectionRepository;

class HomeController extends Controller
{
    /**
     * @return array
     */
    public function index(CollectionRepository $collectionRepository)
    {
        $collections = $collectionRepository->getAllCollection(['model', 'user'])->toArray();

        return [
            'collections' => $collections,
        ];
    }
}
