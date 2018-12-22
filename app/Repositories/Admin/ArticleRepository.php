<?php

namespace App\Repositories\Admin;


use App\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Admin\Article';
    }

}
