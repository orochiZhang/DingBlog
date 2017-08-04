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

        $this->data['articles'] = $this->articleFormat->formatCollection($articles->toArray());
        return response()->json($this->data);
    }

    public function showByTag($id)
    {

    }
}
