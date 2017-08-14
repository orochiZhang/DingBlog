<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title','content','tag_id','type_id','reading','ranking'];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

}
