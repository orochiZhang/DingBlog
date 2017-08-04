<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data['code']=200;
        $this->data['message']='success';
    }

    public function dataNotFound()
    {
        $this->data['code']=404;
        $this->data['message']='data not found';
    }

    public function unauthorized()
    {
        $this->data['code']=401;
        $this->data['message']='unauthorized';
    }

    public function somethingWrong($message)
    {
        $this->data['code']=500;
        $this->data['message']=$message;
    }

    public function pushData($item)
    {
        array_push($this->data,$item);
    }
}
