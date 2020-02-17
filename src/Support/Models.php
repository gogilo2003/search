<?php

namespace Ogilo\Search\Support;

use Ogilo\Search\Support\Model;
use Illuminate\Support\Collection;

class Models extends Collection
{
    public $items;

    function __construct(){
        $args = config('search.models');
        // dd($args);
        foreach($args as $item){
            $this->push(new Model($item));
        };

    }
}
