<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'username', 'password','country_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getNameAttribute($value)
    {
        // return strtoupper($value);
        return ucwords($value);
    }

    public function countries() 
    {
        return $this->hasOne('App\Country');
    }
    
    public function country() 
    {
        return $this->belongsTo('App\Country');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments() 
    {
        return $this->hasMany('App\Comment');
    }

    public function roles()
    {

    }
}
