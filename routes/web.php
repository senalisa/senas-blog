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
| contains the "web" middleware group. Now create something great!
|
*/

/*ROUTE FOR ALL POSTS*/
Route::get('/', [PostController::class, 'index'])->name('home');

/*ROUTE FOR SINGLE POST*/
Route::get('posts/{post:slug}', [PostController::class, 'show']);

/*ROUTE FOR CATEGORY PAGE*/
Route::get('categories/{category:slug}', function (\App\Models\Category $category) {
    //Pass it to the view
    return view('posts', [
        //fetch posts
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

/*ROUTE FOR AUTHORS PAGE*/
Route::get('authors/{author:username}', function (\App\Models\User $author) {
    //Pass it to the view
    return view('posts', [
        //fetch posts
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});







