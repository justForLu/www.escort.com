<?php

namespace App\Http\Controllers\Home;

use App\Models\Home\Appointment;
use App\Http\Requests\Home\AppointmentRequest;
use App\Repositories\Home\Criteria\AppointmentCriteria;
use App\Repositories\Home\AppointmentRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class AppointmentController extends BaseController
{
    /**
     * @var AppointmentRepository
     */
    protected $appointment;

    public function __construct(Request $request, AppointmentRepository $appointment)
    {
        parent::__construct($request);

        $this->appointment = $appointment;
    }

    /**
     * 预约选项页
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        //预约第一步
        if(!isset($params['step'])){
            $params['step'] = 1;
        }
        if(isset($params['step']) && $params['step'] == 1){
            return view('home.appointment.index', compact('params'));
        }
        //预约第二步
        if(isset($params['step']) && $params['step'] == 2){
            return view('home.appointment.index', compact('params'));
        }
        //预约第三步
        if(isset($params['step']) && $params['step'] == 3){
            return view('home.appointment.index', compact('params'));
        }
        //预约第四步
        if(isset($params['step']) && $params['step'] == 4){
            return view('home.appointment.index', compact('params'));
        }
        //预约第五步
        if(isset($params['step']) && $params['step'] == 5){
            return view('home.appointment.index', compact('params'));
        }else{
            $params['step'] = 1;
            return view('home.appointment.index',compact('params'));
        }
    }

    /**
     * 搜索结果
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search_list(Request $request){
        $params = $request->all();


        return view('home.appointment.list', compact('list'));
    }

    /**
     * 预约操作
     */
    public function reserve(){

    }


}
