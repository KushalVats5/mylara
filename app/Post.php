<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
       'title',
       'slug',
       'user_id',
       'content',
       'excerpt',
       'post_type',
       'featured_image',
    ];

    public function author() {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function featuredImage() {
      return $this->belongsTo('App\Media', 'media_id');
    }

    public function categories() {
      return $this->belongsToMany('App\Category');

      // Or more specifically
      return $this->belongsToMany('App\Category', 'post_category', 'id', 'category_id');
    }

    
}
