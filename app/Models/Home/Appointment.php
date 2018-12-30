<?php

namespace App\Models\Home;

use App\Models\Base;

class Appointment extends Base
{
    // 模型对应表名
    protected $table = 'article';

    protected $fillable = ['gmt_update','gmt_create'];

    public $timestamps = false;

}
