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

    /**
     * Attributes Accessors & Mutators
     */
    public function getNameAttribute($value)
    {
        // return strtoupper($value);
        return ucwords($value);
    }

    /**
     * Countries
     */
    public function country() 
    {
        return $this->belongsTo('App\Country');
    }
    
    /**
     * Posts
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getRecentsUpdatedPosts($num)
    {
        if($num > 0) {
            return Post::latest('updated_at')->where('user_id', auth()->user()->id)->limit($num)->get();
        }
    }

    /**
     * Comments
     */
    public function comments() 
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Roles
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
