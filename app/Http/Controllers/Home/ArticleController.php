<?php

namespace App\Http\Controllers\Home;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Parsedown;

class ArticleController extends Controller
{
    public function all($page=1)
    {
        $api="/api/article/all/";
        $url="/article/all/page/";
        return view('home',compact('page','api','url'));
    }

    public function showByTag($id,$page=1)
    {
        $api="/api/article/tag/".$id;
        $url="/article/tag/".$id."/page/";
        return view('articles.showByTag',compact('page','api','url'));
    }

    public function show($id)
    {
        try{
            $article = Article::findOrFail($id);		//查找文章表中有没有该id
        }catch (ModelNotFoundException $e){
            return view('errors.404');
        }
        $parseDown = new Parsedown();

        $article->content=$parseDown->text($article->content);
        return view('articles.show',compact('article'));
    }


}
