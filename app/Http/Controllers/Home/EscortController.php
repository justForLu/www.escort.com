<?php

namespace App\Http\Controllers\Home;

use App\Models\Home\Escort;
use App\Http\Requests\Home\EscortRequest;
use App\Repositories\Home\Criteria\EscortCriteria;
use App\Repositories\Home\EscortRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class EscortController extends BaseController
{
    /**
     * @var EscortRepository
     */
    protected $escort;

    public function __construct(Request $request, EscortRepository $escort)
    {
        parent::__construct($request);

        $this->escort = $escort;
    }

    /**
     * 小姐列表页
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();

        $list = array();

        return view('home.escort.index',compact('list'));
    }

    /**
     * 小姐详情页
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id){


        return view('home.escort.details', compact('escort'));
    }

}
