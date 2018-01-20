<?php

namespace App\Http\Controllers\Api;

use App\Format\ArticleFormat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Article;
use App\Tag;

class ArticleController extends ApiController
{
    protected $articleFormat;

    public function __construct(ArticleFormat $articleFormat)
    {
        $this->articleFormat = $articleFormat;
    }

    public function all()
    {
        $articles = Article::latest('created_at')->with('type')->with('tag')->Paginate(16);
        if($articles->isEmpty()){
            return $this->dataNotFound();
        }
        $data = $this->articleFormat->formatCollection($articles->toArray());
        return $this->responseJson(['articles'=>$data]);
    }

    public function showByTag($id)
    {
        try{
            $tag = Tag::findOrFail($id);
        }catch (ModelNotFoundException $e){
            return $this->dataNotFound('tag');
        }

        $articles = Article::where('tag_id',$id)->latest('created_at')
            ->with('type')->Paginate(16);
        if($articles->isEmpty()){
            return $this->dataNotFound();
        }

        $data = $this->articleFormat->formatCollection($articles->toArray());
        return $this->responseJson(['tag'=>$tag,'articles'=>$data]);
    }

    public function read($id){
        $article=Article::find($id);
        if($article!=null){
            $article->reading++;
            $article->update();
            return $this->responseJson();
        }else{
            return $this->dataNotFound();
        }
    }
}
