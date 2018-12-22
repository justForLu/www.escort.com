<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Article;
use App\Http\Requests\Admin\ArticleRequest;
use App\Repositories\Admin\Criteria\ArticleCriteria;
use App\Repositories\Admin\ArticleRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class ArticleController extends BaseController
{
    /**
     * @var ArticleRepository
     */
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        parent::__construct();

        $this->article = $article;
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

        $this->article->pushCriteria(new ArticleCriteria($params));

        $list = $this->article->paginate(Config::get('admin.page_size',10));

        return view('admin.article.index',compact('params','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->filterAll();

        $result = $this->article->create($data);

        if($result){
            return $this->ajaxSuccess(null,'添加成功',route('admin.article.index'));
        }else{
            return $this->ajaxError('添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->article->find($id);
        $article->image_path = array_values(FileController::getFilePath($article->image));
        if($article->image_path){
            $article->image = $article->image_path[0];
        }else{
            $article->image = '';
        }

        return view('admin.article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $article = $this->article->find($id);
        $article->image_path = array_values(FileController::getFilePath($article->image));
        return view('admin.article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ArticleRequest $request, $id)
    {
        $data = $request->filterAll();

        $result = $this->article->update($data,$id);

        return $this->ajaxAuto($result,'修改',route('admin.article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $result = $this->article->delete($id);

        return $this->ajaxAuto($result,'删除');
    }
}
