<?php

namespace App\Models\Admin;

use App\Models\Base;

class Link extends Base
{
    // 模型对应表名
    protected $table = 'link';

    protected $fillable = ['title','url','link_logo','sort','status','gmt_update','gmt_create'];

    public $timestamps = false;

}
