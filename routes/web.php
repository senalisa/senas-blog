<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
|
|
*/

/*ROUTE FOR ALL POSTS*/
// PostController where we filter the results down
Route::get('/', [PostController::class, 'index'])->name('home');

/*ROUTE FOR SINGLE POST*/
Route::get('posts/{post:slug}', [PostController::class, 'show']);

/*ROUTE FOR REGISTERING*/
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

/*ROUTE FOR LOGIN AND LOGOUT*/
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

/*ROUTE FOR COMMENTING*/
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);







