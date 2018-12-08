<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 16:55
 */

namespace App\Enums;

class BoolEnum extends BaseEnum {

    const YES = 1;
    const NO = 0;

    static $desc = array(
        'YES'=>'是',
        'NO'=>'否',
    );
}
