<?php
namespace Markantonay\XeroLaravel;

use Illuminate\Support\ServiceProvider;
use Markantonay\XeroLaravel\PHPXero\PHPXero;

class XeroLaravelServiceProvider extends ServiceProvider {


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('xero', function ($app) {
            $config = $this->app['config']['xero'];

            return new PHPXero($config['key'], $config['secret'], $config['publicPath'], $config['privatePath'], $config['format']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('xero');
    }

}