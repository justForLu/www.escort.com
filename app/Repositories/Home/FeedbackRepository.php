<?php

namespace App\Repositories\Home;


use App\Repositories\BaseRepository;

class FeedbackRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Home\Feedback';
    }

}
