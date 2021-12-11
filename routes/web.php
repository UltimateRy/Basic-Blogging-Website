<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('profile/{username?}', function($user = null){
//    return view('profile', ['username'=>$user]);
//});

//PROFILES ROUTES

Route::get('/profiles', [ProfileController::class, 'index'])
    ->name('profiles.index')->middleware('auth');;
Route::get('/profiles/{id}', [ProfileController::class, 'show'])
    ->name('profiles.show')->middleware('auth');;

//POSTS ROUTES

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create')->middleware('auth');;
Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store')->middleware('auth');;
Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('posts.show')->middleware('auth');;

require __DIR__.'/auth.php';
