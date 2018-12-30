<?php

namespace App\Enums;

/**
 * @method static BaseEnum ENUM()
 */
class FeedbackEnum extends BaseEnum {

    const UNTREATED = 1;
    const HANDLED = 2;

    static $desc = array(
        'UNTREATED' => '未处理',
        'HANDLED'   => '已处理',
    );
}
