<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Tag;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {

    }

    public function create()
    {
        $url="/admin/article/create";
        $article_url="";
        return view('admin.article.create',compact('url','article_url'));
    }

    public function store(Request $request)
    {
        $input=$request->all();
        Article::create($input);
        $tag=Tag::find($input['tag_id']);
        $tag->count+=1;
        $tag->save();
        $type=Type::find($input['type_id']);
        $type->count+=1;
        $type->save();
        return redirect('/admin/article');
    }

    public function update()
    {

    }

    public function edit($id)
    {
        $url="/admin/article/update".$id;
        $article_url="/admin/article/".$id;
        return view('admin.article.edit');
    }
}
