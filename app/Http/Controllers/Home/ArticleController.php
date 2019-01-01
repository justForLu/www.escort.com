<?php

namespace App\Http\Controllers\Home;

use App\Enums\BasicEnum;
use App\Models\Home\Article;
use App\Repositories\Home\Criteria\ArticleCriteria;
use App\Repositories\Home\ArticleRepository;
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
    /**
     * @param $position
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($position)
    {

        if(!isset($position) || empty($position)){
            $position = 0;
        }

        $article = Article::where('position','=',$position)->where('status','=',BasicEnum::ACTIVE)->first();

        if(!$article){
            $article['title'] = '';
            $article['content'] = '';
        }

//        $article['content'] = htmlspecialchars($article['content']);

        return view('home.article.index',compact('article'));
    }

}
