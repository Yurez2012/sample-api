<?php

namespace App\Http\Controllers\Category;

use App\Actions\BookAuthor\StoreCollectionAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Collection\StoreCollectionRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Arr;

class CollectionController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {

    }

    /**
     * @return void
     */
    public function store(StoreCollectionRequest $request, StoreCollectionAction $storeCollectionAction)
    {
        $data = $request->validated();

        $storeCollectionAction->handle(Arr::get($data, 'model_id'), Arr::get($data, 'model_type'));
    }
}
