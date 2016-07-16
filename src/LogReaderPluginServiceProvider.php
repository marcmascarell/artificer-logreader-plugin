<?php namespace Mascame\Artificer;

use Illuminate\Support\ServiceProvider;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider;


class LogReaderPluginServiceProvider extends ServiceProvider {

	use ServiceProviderLoader;

	public $package = 'mascame/artificer-logreader-plugin';

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$package = $this->package;

		\App::bind($this->package, function () {
			return new LogReaderPlugin();
		});

		\Mascame\Artificer\Artificer::pluginManager()->add('mascame/artificer-logreader-plugin', function() use ($package) {
			return app($package);
		});

		$this->providers([
			LaravelLogViewerServiceProvider::class
		]);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
