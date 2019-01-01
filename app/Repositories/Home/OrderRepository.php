<?php

namespace App\Repositories\Home;


use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Home\Order';
    }

}
