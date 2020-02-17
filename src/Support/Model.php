<?php
namespace Ogilo\Search\Support;

class Model
{
    public $attribute, $model;

    function __construct($item){
        $this->attributes = $item['attributes'];
        $this->model = $item['model'];
    }
}
