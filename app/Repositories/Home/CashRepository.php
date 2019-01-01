<?php

namespace App\Repositories\Home;


use App\Repositories\BaseRepository;

class CashRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Home\Cash';
    }

}
