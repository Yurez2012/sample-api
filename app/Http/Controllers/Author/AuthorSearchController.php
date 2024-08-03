<?php

namespace App\Http\Controllers\Author;

use App\Actions\Author\GetBookAuthorFromGoogleApiAction;
use App\Actions\Book\GetBookByAuthorAction;
use App\Actions\BookAuthor\StoreBookAuthorAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookSearchRequest;
use Illuminate\Support\Arr;

class AuthorSearchController extends Controller
{
    /**
     * @return void
     */
    public function __invoke
    (
        BookSearchRequest                $bookSearchRequest,
        GetBookByAuthorAction            $getBookByAuthorAction,
        GetBookAuthorFromGoogleApiAction $getBookAuthorFromGoogleApiAction,
        StoreBookAuthorAction            $storeAuthorBookAction
    )
    {
        $data = $bookSearchRequest->validated();

        $response = $getBookByAuthorAction->handle(Arr::get($data, 'author'));

        $result = $getBookAuthorFromGoogleApiAction->handle($response);


    }
}
