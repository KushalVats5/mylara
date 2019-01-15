<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $table = 'states';

	public $fillable = ['name','country_id','status'];
}
