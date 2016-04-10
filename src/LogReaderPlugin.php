<?php namespace Mascame\ArtificerLogreaderPlugin;

use Mascame\Artificer\Plugin\AbstractPlugin;


class LogReaderPlugin extends AbstractPlugin {

	public $version = '1.0';
	public $name = 'Log Reader';
	public $description = 'The best (IMO) Log Viewer for Laravel 5 right in the admin interface';
	public $author = 'Marc Mascarell';
	public $thumbnail = 'https://cloud.githubusercontent.com/assets/1575946/5243642/8a00b83a-7946-11e4-8bad-5c705f328bcc.png'; // url

	/**
	 * Artificer does not know about your constructor so you
	 * can inject any dependency you need
	 */
	public function __construct() {
		
	}

	public function getRoutes() {
		\Route::get('logs', [
			'as' => 'admin.plugin.logreader',
			'uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index'
		]);
	}

	/**
	 * This will be called if the plugin is installed
	 */
	public function boot()
	{
	}

	/**
	 * This will be called when plugin is installed
	 */
	public function install() {
		// Maybe some table creation
	}

	/**
	 * This will be called when plugin is uninstalled
	 */
	public function uninstall() {
		// Maybe some table drop or cleanup
	}


}