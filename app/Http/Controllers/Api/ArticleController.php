<?php

namespace App\Http\Controllers\Api;

use App\Format\ArticleFormat;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Article;

class ArticleController extends ApiController
{
    protected $articleFormat;

    public function __construct(ArticleFormat $articleFormat)
    {
        $this->articleFormat = $articleFormat;
    }

    public function all()
    {
        $articles = Article::latest('created_at')->with('type')->Paginate(16);
        if($articles->isEmpty()){
            return $this->dataNotFound();
        }
        $data = $this->articleFormat->formatCollection($articles->toArray());
        return $this->responseJson($data,'articles');
    }

    public function showByTag($id)
    {

    }
}
