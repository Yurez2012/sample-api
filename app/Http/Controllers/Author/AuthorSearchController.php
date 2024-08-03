<?php

namespace App\Http\Controllers\Author;

use App\Actions\Author\GetBookAuthorFromGoogleApiAction;
use App\Actions\Author\StoreAuthorsAction;
use App\Actions\Book\GetBookByAuthorAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookSearchRequest;
use App\Http\Resources\Author\AuthorResource;
use Illuminate\Support\Arr;

class AuthorSearchController extends Controller
{
    /**
     * @param BookSearchRequest                $bookSearchRequest
     * @param GetBookByAuthorAction            $getBookByAuthorAction
     * @param GetBookAuthorFromGoogleApiAction $getBookAuthorFromGoogleApiAction
     * @param StoreAuthorsAction               $storeAuthorsAction
     *
     * @return array
     */
    public function __invoke
    (
        BookSearchRequest                $bookSearchRequest,
        GetBookByAuthorAction            $getBookByAuthorAction,
        GetBookAuthorFromGoogleApiAction $getBookAuthorFromGoogleApiAction,
        StoreAuthorsAction               $storeAuthorsAction
    )
    {
        $data = $bookSearchRequest->validated();

        $response = $getBookByAuthorAction->handle(Arr::get($data, 'author'));

        $result = $getBookAuthorFromGoogleApiAction->handle($response);

        $authors = $storeAuthorsAction->handle($result);

        return [
            'authors' => AuthorResource::collection($authors)
        ];
    }
}
