<?php
namespace App\Http\Controllers\Home;

use App\Models\Home\Config;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{

    public function __construct()
    {
        $config = Config::first();

        view()->share('config',$config);

    }


    public function index()
    {
//        return redirect('/home/index');
        return view('home.index.index');
    }

}




