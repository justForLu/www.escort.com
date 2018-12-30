<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Appointment;
use App\Http\Requests\Admin\AppointmentRequest;
use App\Repositories\Admin\Criteria\AppointmentCriteria;
use App\Repositories\Admin\AppointmentRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class AppointmentController extends BaseController
{
    /**
     * @var AppointmentRepository
     */
    protected $appointment;

    public function __construct(AppointmentRepository $appointment)
    {
        parent::__construct();

        $this->appointment = $appointment;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();

        $this->appointment->pushCriteria(new AppointmentCriteria($params));

        $list = $this->appointment->paginate(Config::get('admin.page_size',10));

        return view('admin.appointment.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AppointmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AppointmentRequest $request)
    {
        $data = $request->filterAll();

        $result = $this->appointment->create($data);

        if($result){
            return $this->ajaxSuccess(null,'添加成功',route('admin.appointment.index'));
        }else{
            return $this->ajaxError('添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = $this->appointment->find($id);

        return view('admin.appointment.show',compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $appointment = $this->appointment->find($id);

        return view('admin.appointment.edit',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AppointmentRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AppointmentRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->appointment->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.appointment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->appointment->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
