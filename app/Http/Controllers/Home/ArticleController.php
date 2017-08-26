<?php

namespace App\Http\Controllers\Home;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Parsedown;

class ArticleController extends Controller
{
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

    public function showByTag($id)
    {
        return view('articles.showByTag',compact('id'));
    }
}
