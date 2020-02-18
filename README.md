# Search models 

The Model implemets the Searchable abstract class

and provide an implementation of of getSearchResult function as follows

```
class ModelName extends Model implements Searchable{
    public function getSearchResult(): SearchResult
    {
        $url = route('route-name' [route parameters]);

        $details = 'formated output, can include html';

        return new \Spatie\Searchable\SearchResult($this, $details, $url);
    }
    .
    .
    .
}

```
