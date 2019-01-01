<?php

namespace App\Repositories\Home;


use App\Repositories\BaseRepository;

class AdvertisementRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Home\Advertisement';
    }

}
