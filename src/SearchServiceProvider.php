<?php

namespace Ogilo\Search;

use Illuminate\Support\ServiceProvider;
use Ogilo\Search\Console\InstallCommand;
use Ogilo\Search\Console\UpdateCommand;

use Artisan;
/**
*
*/
class SearchServiceProvider extends ServiceProvider
{

	protected $commands = [
		UpdateCommand::class
	];

	function register()
	{
		// print(config('app.name').' in register()');
		$this->app->bind('search',function($app){
			return new Search;
		});

		$file = __DIR__.'/Support/helpers.php';
        if (file_exists($file)) {
            require_once($file);
        }


	}

	public function boot()
	{
		// config(['admin.menu.admin-search'=>'Search']);

		if ($this->app->runningInConsole()) {
			$this->commands($this->commands);
		}

		require_once(__DIR__.'/Support/helpers.php');

		$this->loadRoutesFrom(__DIR__.'/../routes/web.php');
		$this->loadRoutesFrom(__DIR__.'/../routes/api.php');
		$this->loadViewsFrom(__DIR__.'/../resources/views','search');
		$this->loadMigrationsFrom(__DIR__.'/../database/migrations');

		$this->publishes([
			__DIR__.'/../database/seeds' => database_path('seeds/vendor/search'),
		], 'search-database');

		$this->publishes([
			__DIR__.'/../public' => public_path('vendor/search')
        ],'search-public');

        $this->publishes([
			__DIR__.'/../config/search.php' => config_path('search.php'),
		], 'search-config');

		$this->publishes([
			__DIR__.'/../resources/views'=>resource_path('views/vendor/search')
		],'search-views');
	}
}
