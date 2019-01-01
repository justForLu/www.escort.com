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



    public function __construct()
    {
        parent::__construct();

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


}
