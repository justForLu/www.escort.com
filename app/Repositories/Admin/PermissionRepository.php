<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 17:25
 */

namespace App\Repositories\Admin;

use App\Repositories\BaseRepository;

class PermissionRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Admin\Permission';
    }

}