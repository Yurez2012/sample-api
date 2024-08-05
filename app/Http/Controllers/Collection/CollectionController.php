<?php

namespace App\Http\Controllers\Collection;

use App\Actions\Collection\StoreCollectionAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Collection\StoreCollectionRequest;
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
