<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 17:23
 */

namespace App\Models\Admin;

use App\Enums\BasicEnum;
use App\Models\Base;

class File extends Base
{
    // 模型对应表名
    protected $table = 'file';

    protected $fillable = ['path','original_name','type'];

    protected $attributes = array(
        'status' => BasicEnum::ACTIVE
    );
}