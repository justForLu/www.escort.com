<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 15:53
 */

namespace App\Http\Controllers\Home;


class IndexController extends BaseController
{

    public function __construct()
    {


    }


    public function index()
    {
        return view('home.index.index');
    }

}
