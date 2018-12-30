<?php

namespace App\Models\Admin;

use App\Models\Base;

class Cash extends Base
{
    // 模型对应表名
    protected $table = 'cash';

    protected $fillable = ['gmt_update','gmt_create'];

    public $timestamps = false;

}
