<?php

namespace App\Models\HOme;

use App\Models\Base;

class Evaluate extends Base
{
    // 模型对应表名
    protected $table = 'evaluate';

    protected $fillable = ['gmt_update','gmt_create'];

    public $timestamps = false;

}
