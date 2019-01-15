<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'first_name', 'middle_name', 'last_name', 'work_number', 'mobile_number', 'fax_number', 'avatar', 'dob', 'housenumber', 'addressline1', 'addressline2', 'zipcode', 'state', 'city', 'country', 'is_active'
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function post_by_author()
    {
        return $this->hasMany(Post::class);
    }
}
