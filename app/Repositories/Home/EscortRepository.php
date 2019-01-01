<?php

namespace App\Repositories\Home;


use App\Repositories\BaseRepository;

class EscortRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Home\Escort';
    }

}
