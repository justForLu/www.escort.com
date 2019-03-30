<?php
namespace App\Http\Controllers\Home;

use App\Models\Home\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $config = Config::first();

        view()->share('config',$config);

    }


    public function index()
    {
//        print_r($this->userInfo->id);
//        return redirect('/home/index');
        return view('home.index.index');
    }

    /**
     * 提示
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function message(Request $request){
        $data = $request->all();
        $message = isset($data['message']) && !empty($data['message']) ? $data['message'] : '未知的提示信息';

        return view('home.index.message', compact('message'));
    }

}




