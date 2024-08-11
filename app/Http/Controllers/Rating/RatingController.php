<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
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
    public function view(Category $category, CollectionRepository $collectionRepository)
    {
        $params = '';

        if($category->title == 'Book') {
            $params = Book::class;
        }

        $collections = $collectionRepository->getCollectionByCategory($params, ['model']);

        return [
            'collections' => $collections
        ];
    }
}
