<?php

namespace App\Repositories\Admin;


use App\Repositories\BaseRepository;

class AdRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Admin\Ad';
    }

}
