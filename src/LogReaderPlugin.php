<?php

namespace Mascame\Artificer;

use Mascame\Artificer\Extension\ResourceCollector;
use Mascame\Artificer\Plugin\AbstractPlugin;

class LogReaderPlugin extends AbstractPlugin
{
    public $name = 'Log Reader';

    public $description = 'The best (IMO) Log Viewer for Laravel 5 right in the admin interface';

    public $author = 'Marc Mascarell (Credit: Rap2hpoutre)';

    public $thumbnail = 'https://cloud.githubusercontent.com/assets/1575946/5243642/8a00b83a-7946-11e4-8bad-5c705f328bcc.png'; // url

    public $slug = 'log-reader-plugin';

    public function getRoutes()
    {
        \Route::get('logs', [
            'as' => 'admin.plugin.logreader',
            'uses' => '\Mascame\Artificer\LogController@index',
        ]);
    }

    public function getMenu()
    {
        return [
            [
                'route'  => 'admin.plugin.logreader',
                'title' => 'Log Reader',
                'icon'  => '<i class="fa fa-book"></i>',
            ],
        ];
    }

    /**
     * Extension config is not available until boot.
     *
     * @param ResourceCollector $collector
     * @return ResourceCollector
     */
    public function resources(ResourceCollector $collector)
    {
        $collector->loadViewsFrom(__DIR__.'/../resources/views', $this->slug);

        return $collector;
    }

    /**
     * This will be called if the plugin is installed.
     */
    public function boot()
    {
    }
}
