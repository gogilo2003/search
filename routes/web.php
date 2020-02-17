<?php
use Illuminate\Support\Facades\Route;

Route::get('search/s',['as'=>'search','uses'=>'Ogilo\Search\Http\Controllers\SearchController@getSearch']);
