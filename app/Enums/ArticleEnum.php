<?php

namespace App\Enums;

/**
 * @method static BaseEnum ENUM()
 */
class ArticleEnum extends BaseEnum {

    const AGREEMENT = 1;
    const HELP = 2;
    const CONTACT = 3;
    const CAREFUL = 4;

    static $desc = array(
        'AGREEMENT' => '隐私协议',
        'HELP'  => '帮助',
        'CONTACT'   => '联系我们',
        'CAREFUL'   => '注意事项'
    );
}
