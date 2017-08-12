<?php

namespace App\Http\Controllers\Api;

use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TypeController extends ApiController
{
    public function all()
    {
        $types=Type::all();
        if($types->isEmpty()){
            return $this->dataNotFound();
        }
        return $this->responseJson(['types'=>$types]);
    }
}
