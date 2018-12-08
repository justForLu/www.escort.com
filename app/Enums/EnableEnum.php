<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 16:56
 */

namespace App\Enums;

class EnableEnum extends BaseEnum {

    const ENABLE = 1;
    const DISABLE = 2;

    static $desc = array(
        'ENABLE' => '启用',
        'DISABLE' => '禁用',
    );
}