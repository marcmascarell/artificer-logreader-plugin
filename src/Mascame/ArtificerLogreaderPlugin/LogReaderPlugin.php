<?php namespace Mascame\ArtificerLogreaderPlugin;

use Mascame\Artificer\Artificer;
use Mascame\Artificer\Plugin\AbstractPlugin;


class LogReaderPlugin extends AbstractPlugin {

	/**
	 * @var \Closure
	 */
	protected $afterFetchClosure;

	public function meta()
	{
		$this->version = '1.0';
		$this->name = 'Log Reader';
		$this->description = 'let you read app log';
		$this->author = 'Marc Mascarell';

		$this->routes = array(
			'configuration' => array(
				'title' => 'Logs',
				'icon'  => '',
				'route' => $this->route('artificer-logreader-plugin')
			)
		);
	}

	public function boot()
	{

	}


}