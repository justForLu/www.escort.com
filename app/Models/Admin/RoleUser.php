<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 17:22
 */

namespace App\Models\Admin;

use App\Models\Base;

class RoleUser extends Base
{
    // 模型对应表名
    protected $table = 'role_user';

    public $timestamps = false;

    protected $fillable = ['user_id','role_id','module'];
}
