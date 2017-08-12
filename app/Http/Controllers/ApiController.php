<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {

    }

    public function dataNotFound($item='')
    {
        $data['code']=404;
        $data['message']=$item.' data not found';
        return response()->json($data);
    }

    public function unauthorized()
    {
        $data['code']=401;
        $data['message']='unauthorized';
        return response()->json($data);
    }

    public function somethingWrong($message)
    {
        $data['code']=500;
        $data['message']=$message;
        return response()->json($data);
    }

    public function responseJson($array)
    {
        $data['code']=200;
        $data['message']='success';
        foreach ($array as $key => $value){
            $data[$key]=$value;
        }
        return response()->json($data);
    }
}
