<?php

namespace App\Http\Controllers\Home;

use App\Models\Admin\Order;
use App\Http\Requests\Admin\OrderRequest;
use App\Repositories\Admin\Criteria\OrderCriteria;
use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class OrderController extends BaseController
{
    /**
     * @var OrderRepository
     */
    protected $order;

    public function __construct(Request $request, OrderRepository $order)
    {
        parent::__construct($request);

        $this->order = $order;
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

        $this->order->pushCriteria(new OrderCriteria($params));

        $list = $this->order->paginate(Config::get('admin.page_size',10));

        return view('admin.order.index',compact('params','list'));
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
     * @param OrderRequest $request
     */
    public function store(OrderRequest $request)
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
        $order = $this->order->find($id);

        return view('admin.order.show',compact('order'));
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
        $order = $this->order->find($id);

        return view('admin.order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(OrderRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->order->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.order.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->order->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
