<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Evaluate;
use App\Http\Requests\Admin\EvaluateRequest;
use App\Repositories\Admin\Criteria\EvaluateCriteria;
use App\Repositories\Admin\EvaluateRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class EvaluateController extends BaseController
{
    /**
     * @var EvaluateRepository
     */
    protected $evaluate;

    public function __construct(EvaluateController $evaluate)
    {
        parent::__construct();

        $this->evaluate = $evaluate;
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

        $this->evaluate->pushCriteria(new EvaluateCriteria($params));

        $list = $this->evaluate->paginate(Config::get('admin.page_size',10));

        return view('admin.evaluate.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EvaluateRequest $request
     */
    public function store(EvaluateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluate = $this->evaluate->find($id);

        return view('admin.evaluate.show',compact('evaluate'));
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
        $evaluate = $this->evaluate->find($id);

        return view('admin.evaluate.edit',compact('evaluate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EvaluateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EvaluateRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->evaluate->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.evaluate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->evaluate->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
