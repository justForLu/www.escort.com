<?php

namespace App\Http\Controllers\Home;

use App\Models\Home\Advertisement;
use App\Repositories\Home\Criteria\AdvertisementCriteria;
use App\Repositories\Home\AdvertisementRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class AdvertisementController extends BaseController
{
    /**
     * @var AdvertisementRepository
     */
    protected $advertisement;

    public function __construct(AdvertisementRepository $advertisement)
    {
        parent::__construct();

        $this->advertisement = $advertisement;
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

        $this->advertisement->pushCriteria(new AdvertisementCriteria($params));

        $list = $this->advertisement->paginate(Config::get('admin.page_size',10));

        return view('admin.advertisement.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdvertisementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AdvertisementRequest $request)
    {
        $data = $request->filterAll();

        $result = $this->advertisement->create($data);

        if($result){
            return $this->ajaxSuccess(null,'添加成功',route('admin.advertisement.index'));
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
        $advertisement = $this->advertisement->find($id);
        $advertisement->image_path = array_values(FileController::getFilePath($advertisement->image));
        if($advertisement->image_path){
            $advertisement->image = $advertisement->image_path[0];
        }else{
            $advertisement->image = '';
        }

        return view('admin.advertisement.show',compact('advertisement'));
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
        $advertisement = $this->advertisement->find($id);
        $advertisement->image_path = array_values(FileController::getFilePath($advertisement->image));
        return view('admin.advertisement.edit',compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdvertisementRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AdvertisementRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->advertisement->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.advertisement.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->advertisement->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
