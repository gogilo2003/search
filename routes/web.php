<?php
use Illuminate\Support\Facades\Route;

Route::get('search/s',['as'=>'search','uses'=>'Ogilo\Search\Http\Controllers\SearchController@getSearch']);

// Route::group(['middleware'=>'web','namespace'=>'Ogilo\AdminMd\Http\Controllers\Web','prefix'=>'admin','as'=>'admin'],function(){
//     Route::get('',['as'=>'-search','uses'=>'SearchController@search']);
// });
