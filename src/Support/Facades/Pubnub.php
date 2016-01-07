<?php
namespace Nodes\Services\Pubnub\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Pubnub
 *
 * @package Nodes\Services\Pubnub\Support\Facades
 */
class Pubnub extends Facade
{
    /**
     * Get the registered name of the component
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @static
     * @access protected
     * @return string
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'nodes.services.pubnub';
    }
}