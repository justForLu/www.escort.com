<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Ad;
use App\Http\Requests\Admin\AdRequest;
use App\Repositories\Admin\Criteria\AdCriteria;
use App\Repositories\Admin\AdRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class AdController extends BaseController
{
    /**
     * @var AdRepository
     */
    protected $ad;

    public function __construct(AdRepository $ad)
    {
        parent::__construct();

        $this->ad = $ad;
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

        $this->ad->pushCriteria(new AdCriteria($params));

        $list = $this->ad->paginate(Config::get('admin.page_size',10));

        return view('admin.ad.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AdRequest $request)
    {
        $data = $request->filterAll();

        $result = $this->ad->create($data);

        if($result){
            return $this->ajaxSuccess(null,'添加成功',route('admin.ad.index'));
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
        $ad = $this->ad->find($id);
        $ad->image_path = array_values(FileController::getFilePath($ad->image));
        if($ad->image_path){
            $ad->image = $ad->image_path[0];
        }else{
            $ad->image = '';
        }

        return view('admin.ad.show',compact('ad'));
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
        $ad = $this->ad->find($id);
        $ad->image_path = array_values(FileController::getFilePath($ad->image));
        return view('admin.ad.edit',compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AdRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->ad->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.ad.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->ad->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
