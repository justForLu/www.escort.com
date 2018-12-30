<?php

namespace App\Repositories\Admin;


use App\Repositories\BaseRepository;

class AdvertisementRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Admin\Advertisement';
    }

}
