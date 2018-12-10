<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/7
 * Time: 16:55
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;

class IndexController extends BaseController
{

    public function index()
    {
        Log::info('test');
        return view('admin.index.index');
    }

}
