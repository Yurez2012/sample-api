<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Repositories\CategoryRepository;
use App\Repositories\CollectionRepository;

class RatingController extends Controller
{
    /**
     * @return array
     */
    public function index(CategoryRepository $categoryRepository)
    {
       return [
           'category' => $categoryRepository->getAllCategory()
       ];
    }

    /**
     * @return array
     */
    public function view($category, CollectionRepository $collectionRepository)
    {
        $params = '';

        if($category == 'Book') {
            $params = Book::class;
        }

        $collections = $collectionRepository->getCollectionByCategory($params, []);

        return [
            'collections' => $collections
        ];
    }
}
