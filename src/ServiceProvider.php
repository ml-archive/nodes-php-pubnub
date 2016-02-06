<?php
namespace Nodes\Services\Pubnub;

use Nodes\AbstractServiceProvider;
use Nodes\Services\Pubnub\Broadcasting\Broadcaster;
use Pubnub\Pubnub;

/**
 * Class ServiceProvider
 *
 * @package Nodes\Services\Pubnub
 */
class ServiceProvider extends AbstractServiceProvider
{
    /**
     * Package name
     *
     * @var string|null
     */
    protected $package = 'pubnub';

    /**
     * Facades to install
     *
     * @var array
     */
    protected $facades = [
        'NodesPubnub' => \Nodes\Services\Pubnub\Support\Facades\Pubnub::class
    ];

    /**
     * Array of configs to copy
     *
     * @var array
     */
    protected $configs = [
        'config/pubnub.php' => 'config/nodes/services/pubnub.php'
    ];

    /**
     * Bootstrap the application service
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return void
     */
    public function boot()
    {
        app('Illuminate\Broadcasting\BroadcastManager')->extend('pubnub', function($app) {
            return new Broadcaster($app['nodes.services.pubnub']);
        });
    }

    /**
     * Register the service provider
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->registerPubnub();
    }

    /**
     * Register Pubnub instance
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access proteected
     * @return void
     */
    protected function registerPubnub()
    {
        $this->app->singleton('nodes.services.pubnub', function ($app) {
            return new Pubnub(
                config('nodes.services.pubnub.credentials.publish_key'),
                config('nodes.services.pubnub.credentials.subscribe_key'),
                config('nodes.services.pubnub.credentials.secret_key'),
                config('nodes.services.pubnub.ssl', true)
            );
        });
    }


    /**
     * Get the services provided by the provider
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return array
     */
    public function provides()
    {
        return ['nodes.services.pubnub'];
    }
}