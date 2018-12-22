<?php

namespace App\Models\Admin;

use App\Models\Base;

class Ad extends Base
{
    // 模型对应表名
    protected $table = 'ad';

    protected $fillable = ['name','image','url','position','sort','remarks','status','gmt_update','gmt_create'];

    public $timestamps = false;

}
