<?php

namespace Mascame\Artificer;

use Mascame\Artificer\Plugin\AbstractPlugin;
use Mascame\Artificer\Extension\ResourceCollector;
use Mascame\Artificer\Assets\AssetsManagerInterface;

class LogReaderPlugin extends AbstractPlugin
{
    use AutoPublishable;

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

        $collector->publishes([
            __DIR__.'/../public' => $this->getAssetsPath(),
        ]);

        return $collector;
    }

    /**
     * @param AssetsManagerInterface $manager
     */
    public function assets(AssetsManagerInterface $manager)
    {
        $manager->add([
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css',
            'https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css',
            'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
            'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
            'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
            'https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js',
            'https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js',
            $this->getAssetsPath('css/main.css'),
            $this->getAssetsPath('js/main.js'),
        ]);
    }

    /**
     * This will be called if the plugin is installed.
     */
    public function boot()
    {
    }
}
