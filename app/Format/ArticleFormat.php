<?php

namespace App\Format;


class ArticleFormat extends Format
{
    public function format($item)
    {
        return [
            'id'=>$item['id'],
            'title'=>$item['title'],
            'type'=>$item['type']['name'],
            'created_at'=>$item['created_at'],
        ];
    }
}