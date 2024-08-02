<?php

namespace App\Http\Controllers\Book;

use App\Actions\Book\GetBookByAuthorAction;
use App\Actions\Book\GetBookTitleFromGoogleApiAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookSearchRequest;
use Illuminate\Support\Arr;

class BookSearchController extends Controller
{
    /**
     * @return void
     */
    public function __invoke
    (
        BookSearchRequest               $bookSearchRequest,
        GetBookByAuthorAction           $getBookByAuthorAction,
        GetBookTitleFromGoogleApiAction $bookTitleFromGoogleApiAction
    )
    {
        $data = $bookSearchRequest->validated();

        $response = $getBookByAuthorAction->handle(Arr::get($data, 'author'));

        $result = $bookTitleFromGoogleApiAction->handle($response);
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        die;
    }
}
