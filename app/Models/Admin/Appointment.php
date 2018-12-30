<?php

namespace App\Models\Admin;

use App\Models\Base;

class Appointment extends Base
{
    // 模型对应表名
    protected $table = 'appointment';

    protected $fillable = ['gmt_update','gmt_create'];

    public $timestamps = false;

}
