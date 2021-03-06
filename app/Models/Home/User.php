<?php

namespace App\Models\Home;

use App\Models\Base;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // 模型对应表名
    protected $table = 'user';

    protected $fillable = ['username','password','nickname','mobile','email','sex','age','birthday','gmt_update','gmt_create','gmt_delete'];

    public $timestamps = false;

}
