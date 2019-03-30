<?php

namespace App\Http\Controllers\Home;

use App\Enums\BasicEnum;
use App\Enums\BoolEnum;
use App\Enums\EscortStatusEnum;
use App\Enums\ModuleEnum;
use App\Http\Requests\Admin\ManagerRequest;
use App\Http\Requests\Home\EscortRequest;
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
     * 小姐个人信息详情（需要首先判断是否已经成为了小姐，如果没有，跳转到escort_add页面；如果已经申请，但是还没有审核通过，则跳到提示页面；否则跳转到这个详情页面）
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function escort_info(){
        $user_id = $this->userInfo->id;

        $escort_info = Escort::where('user_id','=',$user_id)->where('is_pass','=',BoolEnum::YES)->first();

        //如果不存在，则跳转到加入页面；如果已存在，则获取小姐的相关信息到信息详情页面
        if(count($escort_info) > 0){
            if(isset($escort_info->is_pass) && empty($escort_info->is_pass)){
                return redirect('home/index/message?message=信息已提交，等待管理员审核');
            }else{
                return view('home.user.escort_info', compact(''));
            }
        }else{
            return redirect('home/user/escort_add');
        }
    }

    /**
     * 成为小姐的添加页面
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function escort_add(Request $request){
        return view('home.user.escort_add');
    }

    /**
     * 成为小姐的添加操作
     *
     * @param EscortRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function escort_store(EscortRequest $request){
        $params = $request->all();
        //需要插入的数据
        if($params){
            $insert_data['user_id'] = $this->userInfo->id;
            $insert_data['username']    = $this->userInfo->username;
            $insert_data['nickname']    = $this->userInfo->nickname;
            $insert_data['sex'] = $params['sex'];
            $insert_data['birthday']    = $params['birthday'];
            $insert_data['age'] = date('Y', time()) - $params['birthday'];
            $insert_data['bust']    = $params['bust'];
            $insert_data['waist']   = $params['waist'];
            $insert_data['hipline'] = $params['hipline'];
            $insert_data['height']  = $params['height'];
            $insert_data['shape']   = $params['shape'];
            $insert_data['country'] = $params['country'];
            $insert_data['language']    = $params['language'];
            $insert_data['service'] = (isset($params['service']) && !empty($params['service'])) ? implode(',', $params['service']) : '';
            $insert_data['image']   = $params['image'];
            $insert_data['is_pass'] = BoolEnum::NO;
            $insert_data['status'] = EscortStatusEnum::OFFLINE;
            $insert_data['gmt_create']  = get_date();

            //把数据插入到escort表中
            $result = Escort::create($insert_data);
            if($result){
                return $this->ajaxSuccess('','申请提交成功', url('home/index/message?message='.'信息已提交，等待管理员审核'));
            }else{
                return $this->ajaxError('申请提交失败');
            }
        }else{
            return $this->ajaxError('请填写基本信息');
        }
    }

    /**
     * 小姐信息编辑页面
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function escort_edit(Request $request){
        $user_id = $this->userInfo->id;

        $escort = Escort::where('user_id', '=', $user_id)->where('is_pass','=',BoolEnum::YES)->first();

        $escort->image_path = array_values(FileController::getFilePath($escort->image));
        $escort->service = explode(',', $escort->service);

        return view('home.user.escort_edit', compact('escort'));

    }

    /**
     * 小姐信息编辑操作
     *
     * @param EscortRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function escort_update(EscortRequest $request){
        $params = $request->all();

        if($params){

        }else{
            return $this->ajaxError('修改失败');
        }
    }

}
