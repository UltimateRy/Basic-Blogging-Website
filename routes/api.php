<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//POSTS

Route::post('/profiles', [ProfileController::class, 'apiStore'])
    ->name('api.profiles.store');

Route::get('/profiles', [ProfileController::class, 'apiIndex'])
    ->name('api.profiles.index');

//COMMENTS

Route::post('/comments', [CommentController::class, 'apiStore'])
    ->name('api.comments.store');

Route::post('/posts/comments/{id}', [CommentController::class, 'apiIndexPost'])
    ->name('api.comments.indexPost');

Route::get('/comments', [CommentController::class, 'apiIndex'])
    ->name('api.comments.index');

Route::post('/comments/destroy/{id}', [CommentController::class, 'apiDestroy'])
    ->name('api.comments.destroy');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
