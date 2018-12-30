<?php

namespace App\Repositories\Admin;


use App\Repositories\BaseRepository;

class AppointmentRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Models\Admin\Appointment';
    }

}
