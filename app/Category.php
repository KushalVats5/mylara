<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $fillable = ['title','parent_id'];

    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function parents() {
        return $this->belongsTo('App\Category','parent_id','id') ;
    }

    public function childs() {
        return $this->hasMany('App\Category','parent_id','id');
    }

    public function posts() {
     // Or more specifically
     return $this->belongsToMany('App\Category', 'post_category', 'id', 'post_id');
    }
}
