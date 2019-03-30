<?php

namespace App\Models\Home;

use App\Models\Base;

class Escort extends Base
{
    // 模型对应表名
    protected $table = 'escort';

    protected $fillable = ['user_id','username','password','nickname','image','sex','age','birthday','bust','waist','hipline',
        'height','shape','country_id','country','language','service','is_pass','status','gmt_update','gmt_create','gmt_delete'];

    public $timestamps = false;

}
