<?php

namespace App\Http\Controllers\Book;

use App\Actions\Book\GetBookByAuthorAction;
use App\Actions\Book\GetBookTitleFromGoogleApiAction;
use App\Actions\BookAuthor\StoreBookAuthorAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookSearchRequest;
use App\Http\Resources\Book\BookResource;
use App\Http\Resources\BookSearchResource;
use Illuminate\Support\Arr;

class BookSearchController extends Controller
{
    /**
     * @param BookSearchRequest               $bookSearchRequest
     * @param GetBookByAuthorAction           $getBookByAuthorAction
     * @param GetBookTitleFromGoogleApiAction $bookTitleFromGoogleApiAction
     * @param StoreBookAuthorAction           $storeBookAuthorAction
     *
     * @return array
     */
    public function __invoke
    (
        BookSearchRequest               $bookSearchRequest,
        GetBookByAuthorAction           $getBookByAuthorAction,
        GetBookTitleFromGoogleApiAction $bookTitleFromGoogleApiAction,
        StoreBookAuthorAction           $storeBookAuthorAction
    )
    {
        $data = $bookSearchRequest->validated();

        $response = $getBookByAuthorAction->handle(Arr::get($data, 'author'));

        $result = $bookTitleFromGoogleApiAction->handle($response);

        $books = $storeBookAuthorAction->handle($result);

        return [
            'books' => BookResource::collection($books)
        ];
    }
}
