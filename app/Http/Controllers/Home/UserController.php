<?php

namespace App\Http\Controllers\Home;

use App\Enums\BasicEnum;
use App\Enums\BoolEnum;
use App\Enums\ModuleEnum;
use App\Http\Requests\Admin\ManagerRequest;
use App\Models\Admin\RoleUser;
use App\Models\Home\Escort;
use App\Repositories\Admin\Criteria\ManagerCriteria;
use App\Repositories\Admin\Criteria\RoleCriteria;
use App\Repositories\Home\EscortRepository;
use App\Repositories\Admin\RoleRepository as Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{

    protected $escort;

    public function __construct(Request $request, EscortRepository $escort)
    {
        parent::__construct($request);

        $this->escort = $escort;

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

    /**
     * 小姐个人信息详情（需要首先判断是否已经成为了小姐，如果没有，跳转到escort_add页面；否则跳转到这个详情页面）
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function escort_info(){
        $user_id = $this->userInfo->id;

        $escort_info = Escort::where('user_id','=',$user_id)->first();

        //如果不存在，则跳转到加入页面；如果已存在，则获取小姐的相关信息到信息详情页面
        if(count($escort_info) > 0){

            return view('home.user.escort_info', compact(''));
        }else{
            return redirect('home/user/escort_add');
        }
    }

    /**
     * 成为小姐
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function escort_add(Request $request){
        if($request->method() == 'GET'){
            return view('home.user.escort_add');
        }else{
            $params = $request->all();
        }
    }

    /**
     * 小姐信息编辑
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function escort_edit(Request $request){
        $user_id = $this->userInfo->id;

        if($request->method() == 'GET'){
            $escort = Escort::where('user_id', '=', $user_id)->where('is_pass','=',BoolEnum::YES)->first();
            return view('home.user.escort_edit', compact('escort'));
        }else{

        }

    }

}
