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
    protected $fillable = ['username','password','nickname','mobile','email','sex','age','birthday','gmt_update','gmt_create','gmt_delete'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;
}
