<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\CashConfig;
use App\Http\Requests\Admin\CashConfigRequest;
use App\Repositories\Admin\Criteria\CashConfigCriteria;
use App\Repositories\Admin\CashConfigRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class CashConfigController extends BaseController
{
    /**
     * @var CashConfigRepository
     */
    protected $cash_config;

    public function __construct(CashConfigRepository $cash_config)
    {
        parent::__construct();

        $this->cash_config = $cash_config;
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

        $this->cash_config->pushCriteria(new CashConfigCriteria($params));

        $list = $this->cash_config->paginate(Config::get('admin.page_size',10));

        return view('admin.cash_config.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.cash_config.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CashConfigRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CashConfigRequest $request)
    {
        $data = $request->filterAll();

        $result = $this->cash_config->create($data);

        if($result){
            return $this->ajaxSuccess(null,'添加成功',route('admin.cash_config.index'));
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
        $cash_config = $this->cash_config->find($id);

        return view('admin.cash_config.show',compact('cash_config'));
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
        $cash_config = $this->cash_config->find($id);

        return view('admin.cash_config.edit',compact('cash_config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CashConfigRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CashConfigRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->cash_config->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.cash_config.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->cash_config->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
