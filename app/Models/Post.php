<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    //Neem de verschillende onderdelen die in het html bestand staan
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    /**
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     */

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function all() {
        return cache()->rememberForever('posts.all', function () {
            //The laravel function collect will collect an array and wrap it within a collection object
            //Find all of the files in the post directory and collect them into a collection
            return collect(File::files(resource_path("posts")))
                //Map over each item
                ->map(function ($file) {
                    //Parse that file in to a document
                    //Door middel van YamlFrontMatter kunnen we de Matter en de Body van de posts oproepen
                    return \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
                })

                //Map over the second time when u have all the documents
                ->map(function ($document) {
                    //Return and build our own Post object that we are in control of
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })->sortByDesc('date');
        });

    }

    public static function find($slug)
    {
             //of all the blog posts, find the one with a slug that matches the one that was requested.
        return static::all()->firstWhere('slug', $slug);
    }
}
