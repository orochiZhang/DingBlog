<?php

namespace App\Format;


class ArticleByTagFormat extends Format
{
    public function format($item)
    {
        return [
            'id'=>$item['id'],
            'title'=>$item['title'],
            'reading'=>$item['reading'],
            'type'=>$item['type']['name'],
            'created_at'=>date('Y-m-d', strtotime($item['created_at'])),
        ];
    }
}
