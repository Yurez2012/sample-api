<?php

namespace App\Http\Controllers\Collection;

use App\Actions\Collection\PrepareCollectionAction;
use App\Actions\Collection\StoreCollectionAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Collection\StoreCollectionRequest;
use App\Repositories\CollectionRepository;
use Illuminate\Support\Arr;

class CollectionController extends Controller
{
    /**
     * @param CollectionRepository    $collectionRepository
     * @param PrepareCollectionAction $prepareCollectionAction
     *
     * @return array[]
     */
    public function index(CollectionRepository $collectionRepository, PrepareCollectionAction $prepareCollectionAction)
    {
        $collections = $collectionRepository->getCollectionByUserId(auth()->user()->id, 'model')
            ->groupBy('type')
            ->toArray();

        return [
            'collections' => [$prepareCollectionAction->handle($collections)]
        ];
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
