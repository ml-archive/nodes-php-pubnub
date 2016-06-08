<?php
namespace Nodes\Services\Pubnub;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Nodes\Services\Pubnub\Broadcasting\Broadcaster;
use Pubnub\Pubnub;

/**
 * Class ServiceProvider
 *
 * @package Nodes\Services\Pubnub
 */
class ServiceProvider extends IlluminateServiceProvider
{
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
        parent::boot();

        // Register publish groups
        $this->publishGroups();

        // Add PubNub to broadcast manager
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
        $this->registerPubnub();
    }

    /**
     * Register publish groups
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @return void
     */
    protected function publishGroups()
    {
        // Config files
        $this->publishes([
            __DIR__ . '/../config/pubnub.php' => config_path('nodes/services/pubnub.php'),
        ], 'config');
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