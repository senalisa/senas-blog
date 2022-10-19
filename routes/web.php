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

Route::get('/', function () {
    //Pass it to the view
    return view('posts', [
        //fetch posts
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {
    //Find a post by its slug and pass it to the view called "post"
    //View called post
    return view('post', [
        //Pass the post to the view
        'post' => Post::find($slug)
    ]);

//Door het gebruik van where kunnen we ervoor zorgen dat de link van $slug niet een random combinatie kan zijn
})->where('post', '[A-z_\-]+');
