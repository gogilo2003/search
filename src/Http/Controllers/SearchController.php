<?php

namespace Ogilo\Search\Http\Controllers;

use Ogilo\Model\Support;
use Ogilo\Search\Support\Models;

use Illuminate\Http\Request;
use Ogilo\AdminMd\Models\Page;

use Spatie\Searchable\Search;
use App\Http\Controllers\Controller;
use Spatie\Searchable\ModelSearchAspect;

class SearchController extends Controller
{
    function getSearch(Request $request, Models $models){
		$page = new Page;
		$page->title = 'Search Results'.($request->q ? ' for'.$request->q : '');
        // dd($models);
        $searchResults = new Search();
        foreach ($models as $model) {
            $searchResults->registerModel($model->model, function(ModelSearchAspect $modelSearchAspect) use($model) {
                        foreach ($model->attributes as $attribute) {
                            $modelSearchAspect->addSearchableAttribute($attribute);
                        }
					});
        }
        $results = $searchResults->search($request->q ?? '%');

        $total = 0;
        foreach ($results as $result) {
            foreach ($result as $item) {
                $total++;
            }
        }

		return view()->first(['web.search','search','search::web.results'],['results'=>$results,'total'=>$total,'page'=>$page, $search_value=>$request->q]);
	}
}
