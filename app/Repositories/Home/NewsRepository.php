<?php

namespace App\Repositories\Home;


use App\Repositories\BaseRepository;

class NewsRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Home\News';
    }

}
