<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        //Pass it to the view
        return view('posts', [
            //fetch posts
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        //Find a post by its slug and pass it to the view called "post"
        //View called post
        return view('post', [
            //Pass the post to the view
            'post' => $post
        ]);
    }
}
