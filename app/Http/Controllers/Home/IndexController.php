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
//        return redirect('/home/index');
        return view('home.index.index');
    }

}




