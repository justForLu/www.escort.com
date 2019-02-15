<?php
namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class BaseController extends Controller
{
    protected $userInfo;
    protected $callback;
    protected $auth;

    /**
     * 父类构造器(接口请求拦截)
     * BaseController constructor.
     *
     * BaseController constructor.
     * @param $request
     */
    public function __construct($request){

        $this->auth = Auth::guard('home');

        $this->userInfo = $this->auth->user();
        $this->callback = isset($_SERVER['HTTP_REFERER']) ? urlencode($_SERVER['HTTP_REFERER']) : '';


        view()->share('callback',$this->callback);
    }


}
