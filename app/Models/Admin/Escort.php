<?php

namespace App\Models\Admin;

use App\Models\Base;

class Escort extends Base
{
    // 模型对应表名
    protected $table = 'escort';

    protected $fillable = ['gmt_update','gmt_create'];

    public $timestamps = false;

}
