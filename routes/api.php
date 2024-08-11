<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Author\AuthorSearchController;
use App\Http\Controllers\Book\BookSearchController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Collection\CollectionController;
use App\Http\Controllers\Friend\FriendController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Rating\RatingController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);


Route::middleware('auth:api')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/profile', ProfileController::class);
    Route::get('/book_search', BookSearchController::class);
    Route::get('/author_search', AuthorSearchController::class);

    Route::post('/collection', [CollectionController::class, 'store']);
    Route::get('/collection', [CollectionController::class, 'index']);

    Route::get('/friend', [FriendController::class, 'index']);

    Route::get('/rating', [RatingController::class, 'index']);
    Route::get('/rating/{category}', [RatingController::class, 'view']);
    Route::put('/rating/{collection}', [RatingController::class, 'update']);
});
