<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * @param CategoryRepository $categoryRepository
     *
     * @return array
     */
    public function index(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->getAllCategory();

        return [
            'categories' => CategoryResource::collection($categories),
        ];
    }
}
