<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\EditUserController;
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

Route::get('/my-account', [RegisterController::class, 'index'])->middleware('auth');
Route::get('/my-account/{user}/edit', [RegisterController::class, 'edit'])->middleware('auth');
Route::patch('/my-account/{user}', [RegisterController::class, 'update'])->middleware('auth');
Route::delete('/my-account/{user}', [RegisterController::class, 'destroy'])->middleware('auth');

/*ROUTE FOR LOGIN AND LOGOUT*/
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

/*ROUTE FOR EDITING USER INFO*/
//Route::get('user/my-account', [EditUserController::class, 'index'])->middleware('auth');
//Route::get('user/user/{user}/edit', [EditUserController::class, 'edit'])->middleware('auth');
//Route::patch('user/user/{user}', [EditUserController::class, 'update'])->middleware('auth');
//Route::delete('user/user/{user}', [EditUserController::class, 'delete'])->middleware('auth');

/*ROUTE FOR COMMENTING*/
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

/*ROUTE FOR ADMINS*/
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');





