<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 16:56
 */

namespace App\Enums;

class ModuleEnum extends BaseEnum {

    const ADMIN = 1;
    const HOME = 2;

    static $desc = array(
        'ADMIN'=>'后台',
        'HOME'=>'前台',
    );
}