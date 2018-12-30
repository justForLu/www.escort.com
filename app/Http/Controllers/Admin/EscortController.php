<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Escort;
use App\Http\Requests\Admin\EscortRequest;
use App\Repositories\Admin\Criteria\EscortCriteria;
use App\Repositories\Admin\EscortRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class EscortController extends BaseController
{
    /**
     * @var EscortRepository
     */
    protected $escort;

    public function __construct(EscortRepository $escort)
    {
        parent::__construct();

        $this->escort = $escort;
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

        $this->escort->pushCriteria(new EscortCriteria($params));

        $list = $this->escort->paginate(Config::get('admin.page_size',10));

        return view('admin.escort.index',compact('params','list'));
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
     * @param EscortRequest $request
     */
    public function store(EscortRequest $request)
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
        $escort = $this->escort->find($id);

        return view('admin.escort.show',compact('escort'));
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
        $escort = $this->escort->find($id);

        return view('admin.escort.edit',compact('escort'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EscortRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EscortRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->escort->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.escort.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->escort->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
