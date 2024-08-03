<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Author\AuthorSearchController;
use App\Http\Controllers\Book\BookSearchController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);


Route::middleware('auth:api')->group(function () {
    Route::get('/profile', ProfileController::class);
    Route::get('/book_search', BookSearchController::class);
    Route::get('/author_search', AuthorSearchController::class);
});
