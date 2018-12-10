<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 17:23
 */

namespace App\Http\Controllers\Admin;

use App\Enums\BasicEnum;
use App\Http\Controllers\Controller;
use App\Requests\Admin\LoginRequest;
use App\Requests\Request;
use App\Repositories\Admin\ManagerRepository as Manager;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * 指定guard
     * @var string
     */
    protected $guard = 'web';

    /**
     * @var
     */
    protected $manager;


    public function __construct(Manager $manager)
    {
        //$this->middleware('guest', ['except' => 'logout']);
        $this->manager = $manager;
    }

    public function showLoginForm()
    {
        return view('admin.index');
    }

    /**
     * 登录视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.login.index');
    }

    /**
     * 登录校验处理(重写框架默认自带的登录校验)
     * @param LoginRequest $loginRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(LoginRequest $loginRequest)
    {
        if ($this->hasTooManyLoginAttempts($loginRequest)) {
            $this->fireLockoutEvent($loginRequest);

            return $this->sendLockoutResponse($loginRequest);
        }

        if ($this->attemptLogin($loginRequest)) {
            $manager = $this->manager->findBy('username',$loginRequest->username);

            if($manager->status == BasicEnum::ACTIVE){
                return $this->sendLoginResponse($loginRequest);
            } else {
                return response(['msg' => '该用户已被禁用'], 300);
            }

        }else{
            // 登录失败
            $this->incrementLoginAttempts($loginRequest);

            return response(['msg' => '用户名或密码不正确'], 300);
        }

    }

    /**
     * 更新用户的登录信息
     * @param $loginRequest
     */
    public function updateLoginInfo($loginRequest)
    {
        $data['last_ip'] = $loginRequest->ip();
        $data['gmt_last_login'] = get_date();
        $uid = Auth::User()->id;
        $this->manager->update($data,$uid);
    }

    /**
     * 重写登录用户名字段
     * @return string
     */
    public function username()
    {
        return 'username';
    }


    /**
     * 登录成功后返回
     * @param Request $request
     * @param $user
     * @return string
     */
    public function authenticated(Request $request, $user){
        $this->updateLoginInfo($request);
//        return response()->json(array());
        return redirect()->intended($this->redirectPath());
    }
}