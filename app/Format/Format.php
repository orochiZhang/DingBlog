<?php

namespace App\Format;

/**
 * Class Format
 * @package App\Format
 */
abstract class Format
{
    /**
     * @param $items
     * @return array
     */
    public function formatCollection($items)
    {
        $items['data']=array_map([$this,'format'],$items['data']);
        return $items;
    }

    /**
     * @param $item
     * @return mixed
     */
    abstract public function format($item);
}