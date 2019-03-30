<?php

namespace App\Enums;

/**
 * @method static BaseEnum ENUM()
 */
class EscortStatusEnum extends BaseEnum {

    const ONLINE = 1;
    const OFFLINE   = 2;

    static $desc = array(
        'ONLINE' => '在线',
        'OFFLINE'   => '离线',
    );
}
