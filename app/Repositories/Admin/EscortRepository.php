<?php

namespace App\Repositories\Admin;


use App\Repositories\BaseRepository;

class EscortRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Admin\Escort';
    }

}
