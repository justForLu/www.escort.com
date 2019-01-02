<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Home\UserRepository as Users;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * 登录成功跳转
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * 退出跳转
     * @var string
     */
    protected $redirectAfterLogout = '/home/login';

    /**
     * 指定用户名字段
     * @var string
     */
    protected $username = 'mobile';

    /**
     * 指定guard
     * @var string
     */
    protected $guard = 'home';

    /**
     * @var
     */
    protected $user;


    /**
     * LoginController constructor.
     * @param Users $user
     */
    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    /**
     * 登录视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $type = 'login';

        return view('home.login.index', compact('type'));
    }

    /**
     * 登录校验处理(重写框架默认自带的登录校验)
     * @param LoginRequest $loginRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(LoginRequest $loginRequest)
    {
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($loginRequest)) {
            $this->fireLockoutEvent($loginRequest);

            return $this->sendLockoutResponse($loginRequest);
        }

        $credentials = $this->getCredentials($loginRequest);

        $mobile = $credentials['mobile'];
        $password = bcrypt($credentials['password']);

        if (Auth::guard($this->getGuard())->attempt($credentials, $loginRequest->has('remember'))) {

            $this->updateLoginInfo($loginRequest);

            if ($throttles) {
                $this->clearLoginAttempts($loginRequest);
            }

            return response()->json(['status' => 'success','code' => '200','msg' => Lang::get('auth.success'),'referrer' => $this->redirectPath()]);
        }

        return response()->json(['status' => 'fail','code' => '300','msg' => $this->getFailedLoginMessage()]);
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
        $this->user->update($data,$uid);
    }

    /**
     * 用户登出
     * @return mixed
     */
    public function logout()
    {
        Auth::guard($this->getGuard())->logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

}
