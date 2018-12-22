<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ConfigRequest;
use App\Repositories\Admin\ConfigRepository;
use Illuminate\Http\Request;

class ConfigController extends BaseController
{
    /**
     * @var ConfigRepository
     */
    protected $config;

    public function __construct(ConfigRepository $config)
    {
        parent::__construct();

        $this->config = $config;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $config = $this->config->find(1);

        return view('admin.config.index',compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.config.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ConfigRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ConfigRequest $request)
    {
        $data = $request->filterAll();

        $result = $this->config->create($data);

        if($result){
            return $this->ajaxSuccess(null,'添加成功',route('admin.config.index'));
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
        $config = $this->config->find($id);

        return view('admin.config.show',compact('config'));
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
        $config = $this->config->find($id);

        return view('admin.config.edit',compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ConfigRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ConfigRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->config->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.config.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->config->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
