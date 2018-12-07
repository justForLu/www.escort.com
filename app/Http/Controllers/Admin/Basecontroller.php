<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/7
 * Time: 16:53
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    protected $currentUser;
    protected $redis;

    /**
     * 父类构造器
     * BaseController constructor.
     */
    public function __construct()
    {
        if(Auth::check()){
            //获取用户菜单和当前用户
            $userMenus = $this->getUserMenus();
            $this->currentUser = $this->getCurrentUser();
//            $this->operation = $operationLogs;

            view()->share('user', $this->currentUser);
            view()->share('userMenus', $userMenus);
        }
        $this->redis = $this->redis();
    }

    public function writeOperateLog($action){
        $data = array(
            'manager_id' => Auth::user()->id,
            'role' => UserTypeEnum::ADMIN,
            'action' => $action,
            'action_ip' => get_client_ip(),
        );
        return OperationLogs::create($data);
    }

}