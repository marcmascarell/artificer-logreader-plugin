<?php

namespace Mascame\Artificer;

class LogReaderPluginServiceProvider extends ArtificerExtensionServiceProvider
{
    use ServiceProviderLoader;

    protected $package = 'mascame/artificer-logreader-plugin';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->addPlugin(LogReaderPlugin::class);
    }
}
