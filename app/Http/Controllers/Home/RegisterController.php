<?php
namespace App\Http\Controllers\Home;

use App\User;
use App\Http\Requests\Home\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * 登录成功跳转
     * @var string
     */
    protected $redirectTo = '/home';


    /**
     * LoginController constructor.
     */
    public function __construct()
    {

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
            'mobile' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    /**
     * 用户注册页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        $type = 'register';

        return view('home.login.index', compact('type'));
    }

    /**
     * 注册
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Foundation\Validation\ValidationException
     */
    public function postRegister(RegisterRequest $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));

        return response()->json(['status' => 'success','code' => '200','msg' => '注册成功','referrer' => $this->redirectPath()]);

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
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),

        ]);
    }
}
