<?php

namespace App\Http\Controllers\Home;

use App\Models\Home\Cash;
use App\Http\Requests\Home\CashRequest;
use App\Repositories\Home\Criteria\CashCriteria;
use App\Repositories\Home\CashRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class CashController extends BaseController
{
    /**
     * @var CashRepository
     */
    protected $cash;

    public function __construct(Request $request, CashRepository $cash)
    {
        parent::__construct($request);

        $this->cash = $cash;
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

        $this->cash->pushCriteria(new CashCriteria($params));

        $list = $this->cash->paginate(Config::get('admin.page_size',10));

        return view('admin.cash.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.cash.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CashRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CashRequest $request)
    {
        $data = $request->filterAll();

        $result = $this->cash->create($data);

        if($result){
            return $this->ajaxSuccess(null,'添加成功',route('admin.cash.index'));
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
        $cash = $this->cash->find($id);

        return view('admin.cash.show',compact('cash'));
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
        $cash = $this->cash->find($id);

        return view('admin.cash.edit',compact('cash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CashRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CashRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->cash->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.cash.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->cash->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
