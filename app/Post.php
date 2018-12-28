<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
       'title',
       'slug',
       'content',
       'excerpt',
       'post_type',
       'featured_image',
    ];
}
