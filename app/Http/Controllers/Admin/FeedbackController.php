<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Feedback;
use App\Http\Requests\Admin\FeedbackRequest;
use App\Repositories\Admin\Criteria\FeedbackCriteria;
use App\Repositories\Admin\FeedbackRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class FeedbackController extends BaseController
{
    /**
     * @var FeedbackRepository
     */
    protected $feedback;

    public function __construct(FeedbackRepository $feedback)
    {
        parent::__construct();

        $this->feedback = $feedback;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();

        $this->feedback->pushCriteria(new FeedbackCriteria($params));

        $list = $this->feedback->paginate(Config::get('admin.page_size',10));

        return view('admin.feedback.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeedbackRequest $request
     */
    public function store(FeedbackRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = $this->feedback->find($id);

        return view('admin.feedback.show',compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @param Request $request
     */
    public function edit($id,Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FeedbackRequest $request
     * @param $id
     */
    public function update(FeedbackRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
