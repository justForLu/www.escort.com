<?php
namespace App\Http\Controllers\Home;


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




