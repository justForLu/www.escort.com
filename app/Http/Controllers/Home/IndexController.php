<?php
namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{

    public function __construct()
    {


    }


    public function index()
    {
//        return redirect('/home/index');
        return view('home.index.index');
    }

}




