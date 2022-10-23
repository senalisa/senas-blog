<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


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
Route::get('/', function () {
    //Pass it to the view
    return view('posts', [
        //fetch posts
        'posts' => Post::latest('published_at')->get() //Get less queries
    ]);
});

/*ROUTE FOR SINGLE POST*/
//Route (posts) Model (Post) Bounding
Route::get('posts/{post:slug}', function (Post $post) { //Give me the Post::where('slug', $post)->firstOrFail()
    //Find a post by its slug and pass it to the view called "post"
    //View called post
    return view('post', [
        //Pass the post to the view
        'post' => $post
    ]);

//Door het gebruik van where kunnen we ervoor zorgen dat de link van $slug niet een random combinatie kan zijn
});

/*ROUTE FOR CATEGORY PAGE*/
Route::get('categories/{category:slug}', function (\App\Models\Category $category) {
    //Pass it to the view
    return view('posts', [
        //fetch posts
        'posts' => $category->posts
    ]);
});

/*ROUTE FOR AUTHORS PAGE*/
Route::get('authors/{author:username}', function (\App\Models\User $author) {
    //Pass it to the view
    return view('posts', [
        //fetch posts
        'posts' => $author->posts
    ]);
});







