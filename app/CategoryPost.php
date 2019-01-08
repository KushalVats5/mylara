<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = 'category_post';
    public $fillable = ['post_id','category_id'];

    /**
     * Get the index name for the model.
     *
     * @return string
    */
    protected $guarded = ['id'];

    public function cats()
    {
        return $this->belongsTo('App\CategoryPost', 'post_id');
    }
}
