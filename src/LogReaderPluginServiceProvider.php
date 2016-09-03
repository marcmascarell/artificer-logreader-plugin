<?php namespace Mascame\Artificer;

use Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider;


class LogReaderPluginServiceProvider extends ArtificerExtensionServiceProvider {

	use ServiceProviderLoader;

	public $package = 'mascame/artificer-logreader-plugin';

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		\App::bind(LogReaderPlugin::class);

        $this->addPlugin(LogReaderPlugin::class);

		$this->providers([
			LaravelLogViewerServiceProvider::class
		]);
	}

}
