<?php

namespace App\Repositories\Admin;


use App\Repositories\BaseRepository;

class CashRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Admin\Cash';
    }

}
