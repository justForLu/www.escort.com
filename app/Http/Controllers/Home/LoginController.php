<?php
namespace App\Http\Controllers\Home;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Home\RegisterRequest;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Admin\UserRepository as Users;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Auth\User as AuthUser;

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
    protected $username = 'username';

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:user',
            'password' => 'required|min:6|confirmed',
        ]);
    }



    /**
     * 用户注册页面
     *
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request)
    {
        $type = 'register';



    }

    /**
     * 注册
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Foundation\Validation\ValidationException
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        Auth::guard($this->getGuard())->login($this->create($request->all()));

        return redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
