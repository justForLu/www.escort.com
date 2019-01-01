<?php

namespace App\Repositories\Home;


use App\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Home\Article';
    }

}
