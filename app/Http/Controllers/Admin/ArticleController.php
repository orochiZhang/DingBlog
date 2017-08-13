<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {

    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store()
    {

    }

    public function update()
    {

    }
}
