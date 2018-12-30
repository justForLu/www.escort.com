<?php

namespace App\Repositories\Admin;


use App\Repositories\BaseRepository;

class CashConfigRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Admin\CashConfig';
    }

}
