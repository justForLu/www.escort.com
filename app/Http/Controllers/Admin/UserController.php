<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\User;
use App\Http\Requests\Admin\UserRequest;
use App\Repositories\Admin\Criteria\UserCriteria;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class UserController extends BaseController
{
    /**
     * @var UserRepository
     */
    protected $user;

    public function __construct(UserRepository $user)
    {
        parent::__construct();

        $this->user = $user;
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

        $this->user->pushCriteria(new UserCriteria($params));

        $list = $this->user->paginate(Config::get('admin.page_size',10));

        return view('admin.user.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $data = $request->filterAll();

        $result = $this->user->create($data);

        if($result){
            return $this->ajaxSuccess(null,'添加成功',route('admin.user.index'));
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
        $user = $this->user->find($id);

        return view('admin.user.show',compact('user'));
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
        $user = $this->user->find($id);

        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->user->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->user->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
