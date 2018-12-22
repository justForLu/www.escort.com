<?php

namespace App\Models\Admin;

use App\Models\Base;

class Article extends Base
{
    // 模型对应表名
    protected $table = 'article';

    protected $fillable = ['title','position','status','content','gmt_update','gmt_create'];

    public $timestamps = false;

}
