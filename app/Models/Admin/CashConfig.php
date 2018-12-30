<?php

namespace App\Models\Admin;

use App\Models\Base;

class CashConfig extends Base
{
    // 模型对应表名
    protected $table = 'cash_config';

    protected $fillable = ['gmt_update','gmt_create'];

    public $timestamps = false;

}
