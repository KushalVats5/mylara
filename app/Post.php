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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }
    public function author() {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function featuredImage() {
      return $this->belongsTo('App\Media', 'media_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
     public function postCategory() {
       return $this->hasMany('App\PostCategory', 'category_id' );
   }

   /* public function category() {
        return $this->belongsTo(Category::class); // don't forget to add your full namespace
    }
*/
    
}
