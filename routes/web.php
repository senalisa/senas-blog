<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
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









