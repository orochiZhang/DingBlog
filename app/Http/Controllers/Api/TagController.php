<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Tag;

class TagController extends ApiController
{
    public function all()
    {
        $tags=Tag::all();
        if($tags->isEmpty()){
            return $this->dataNotFound();
        }
        return $this->responseJson(['tags'=>$tags]);
    }
}
