<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 16:54
 */

namespace App\Enums;

class BasicEnum extends BaseEnum {

    const ACTIVE = 1;
    const DELETE = 99;

    static $desc = array(
        'ACTIVE'=>'正常',
        'DELETE'=>'禁用',
    );
}
