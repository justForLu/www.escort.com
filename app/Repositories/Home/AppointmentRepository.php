<?php

namespace App\Repositories\Home;


use App\Repositories\BaseRepository;

class AppointmentRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Home\Appointment';
    }

}
