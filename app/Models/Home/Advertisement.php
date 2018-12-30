<?php

namespace App\Models\Home;

use App\Models\Base;

class Advertisement extends Base
{
    // 模型对应表名
    protected $table = 'advertisement';

    protected $fillable = ['name','image','url','position','sort','remarks','status','gmt_update','gmt_create'];

    public $timestamps = false;

}
