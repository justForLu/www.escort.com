<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected  $table = 'user';//这歌就是你新表

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['password','mobile','email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public $timestamps = false;
}
