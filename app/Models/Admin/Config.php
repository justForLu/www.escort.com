<?php

namespace App\Models\Admin;

use App\Models\Base;

class Config extends Base
{
    // 模型对应表名
    protected $table = 'config';

    protected $fillable = ['website_name','website_desc','keywords','time_zone','currency','mobile','phone','copyright','record_logo','record'
                    ,'login_logo','index_logo','backstage_logo','admin_logo','login_bg','gmt_create','gmt_update'];

    public $timestamps = false;

}
