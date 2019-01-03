<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function posts() {
      return $this->belongsToMany('App\Category');

     // Or more specifically
     return $this->belongsToMany('App\Category', 'post_category', 'id', 'post_id');
    }
}
