<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Link;
use App\Http\Requests\Admin\LinkRequest;
use App\Repositories\Admin\Criteria\LinkCriteria;
use App\Repositories\Admin\LinkRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class LinkController extends BaseController
{
    /**
     * @var LinkRepository
     */
    protected $link;

    public function __construct(LinkRepository $link)
    {
        parent::__construct();

        $this->link = $link;
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

        $this->link->pushCriteria(new LinkCriteria($params));

        $list = $this->link->paginate(Config::get('admin.page_size',10));

        return view('admin.link.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LinkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LinkRequest $request)
    {
        $data = $request->filterAll();

        $result = $this->link->create($data);

        if($result){
            return $this->ajaxSuccess(null,'添加成功',route('admin.link.index'));
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
        $link = $this->link->find($id);

        return view('admin.link.show',compact('link'));
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
        $link = $this->link->find($id);

        return view('admin.link.edit',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LinkRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(LinkRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->link->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.link.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->link->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
