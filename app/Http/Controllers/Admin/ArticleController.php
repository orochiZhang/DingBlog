<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Tag;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function create()
    {
        return view('admin.article.create');
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

    public function update($id,Request $request)
    {
        $input=$request->all();
        $article=Article::find($id);
        $article->update($input);
        return redirect('/admin/article');
    }

    public function edit($id)
    {
        $article=Article::find($id);
        //dd($article);
        return view('admin.article.edit',compact('article'));
    }

    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        //return redirect('/admin/article');
        $data['code']=200;
        return response()->json($data);
    }
}
