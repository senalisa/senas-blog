<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

//Admin page to manage all of the posts
class AdminPostController extends Controller
{
    public function index() {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
            ]);
    }

    //Create post IF admin
    public function create()
    {
        return view('admin.posts.create');
    }

    //Store Post
    public function store()
    {

        $attributes = $this->validatePost();

        $attributes['slug']=Str::slug(request('title'));
        $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id']=auth()->id();

        Post::create($attributes);

        return redirect('/');
    }

    public  function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {

        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('succes', 'Post is Updated! Yay!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('succes', 'Post is Deleted! Yay!');
    }

    /**
     * @param Post $post
     * @return array
     */
   protected function validatePost(?Post $post = null): array
    {
        //Do we have a post? Use that. If we don't, new Post()
        $post ??= new Post();

        return request()->validate(
            [
                'title' => ['required', Rule::unique('posts', 'title')],
                'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
                'excerpt' => 'required',
                'body' => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')],
                'published_at' => 'required'
            ]);
    }
}
