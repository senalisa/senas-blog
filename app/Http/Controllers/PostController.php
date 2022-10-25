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
        return view('posts.index', [
            //fetch posts and filter the search, category and author
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString() //With paginate we can create a pagination
        ]);
    }

    public function show(Post $post)
    {
        //Find a post by its slug and pass it to the view called "post"
        //View called post
        return view('posts.show', [
            //Pass the post to the view
            'post' => $post
        ]);
    }
}
