<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //acces to factory
    //Hier kiezen we de onderwerpen die NIET veranderd kunnen worden
    protected $guarded = [];

    //Hier kiezen we de onderwerpen die veranderd kunnen worden
//    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'category_id'];

    //Hier zorgen we er voor dat er minder queries zijn in de browser (clockwork)
    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
