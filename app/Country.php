<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id'
    ];

    public function users() {
        return $this->hasMany('App\User');
    }

    public function posts() {
        return $this->hasManyThrough('App\Post', 'App\User', 'country_id', 'user_id');
    }

    public function commentable() 
    {

    }
}
