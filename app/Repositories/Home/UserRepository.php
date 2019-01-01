<?php

namespace App\Repositories\Home;


use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Home\User';
    }

}
