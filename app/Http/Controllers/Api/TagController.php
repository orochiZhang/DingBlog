<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Tag;

class TagController extends ApiController
{
    public function all()
    {
        $tags=Tag::latest('count')->get();
        if($tags->isEmpty()){
            return $this->dataNotFound();
        }
        return $this->responseJson(['tags'=>$tags]);
    }
}
