<?php

namespace App\Http\Controllers\Home;

use App\Enums\BoolEnum;
use App\Enums\ModuleEnum;
use App\Http\Requests\Admin\ManagerRequest;
use App\Models\Admin\RoleUser;
use App\Repositories\Admin\Criteria\ManagerCriteria;
use App\Repositories\Admin\Criteria\RoleCriteria;
use App\Repositories\Admin\ManagerRepository as Manager;
use App\Repositories\Admin\RoleRepository as Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{



    public function __construct(Request $request)
    {
        parent::__construct($request);

    }

    /**
     * 个人中心
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home.user.index');
    }

    /**
     * 我的订单
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function order(Request $request){
        $params = $request->all();
        $order = array();

        return view('home.user.order', compact('order'));

    }

    /**
     * 找回密码页面
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function findPassword(Request $request){
        $params = $request->all();

        //找回密码第一步
        if(!isset($params['step'])){
            $params['step'] = 1;

            return view('home.user.password', compact('params'));
        }
        //找回密码第二步
        if(isset($params['step']) && $params['step'] == 2){
            return view('home.user.password', compact('params'));
        }

    }

    /**
     * 更改密码操作
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request){
        $data = $request->all();


        $result = 1;

        return $this->ajaxAuto($result, '更改密码', url('/home/login'));
    }

}
