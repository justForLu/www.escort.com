<?php

namespace App\Models\Home;

use App\Models\Base;

class OrderAction extends Base
{
    // 模型对应表名
    protected $table = 'order_action';

    protected $fillable = ['gmt_update','gmt_create'];

    public $timestamps = false;

}
