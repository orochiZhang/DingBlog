<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Tag;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index($page)
    {

    }

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
        if($article->tag_id!=$input['tag_id']){
            $tag=Tag::find($article->tag_id);
            $tag->count--;
            $tag->save();
            $newTag=Tag::find($input['tag_id']);
            $newTag->count++;
            $newTag->save();
        }
        if($article->type_id!=$input['type_id']){
            $type=Type::find($article->type_id);
            $type->count--;
            $type->save();
            $netType=Type::find($input['type_id']);
            $netType->count++;
            $netType->save();
        }
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
        if($article!=null){
            $tag=Tag::find($article->tag_id);
            $tag->count--;
            $tag->update();

            $article->delete();
            $data['code']=200;
            return response()->json($data);
        }else{
            $data['code']=404;
            $data['message']='article not found';
            return response()->json($data);
        }
    }
}
