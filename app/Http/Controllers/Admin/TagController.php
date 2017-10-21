<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags=Tag::all();
        return view('admin.tag.index',compact('tags'));
    }

    public function store(Request $request)
    {
        $input=$request->all();
        Tag::create($input);
        return redirect('/admin/tag');
    }
}
