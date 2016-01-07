<?php
namespace Nodes\Services\Pubnub\Broadcasting;

use Illuminate\Contracts\Broadcasting\Broadcaster as IlluminateContractBroadcaster;
use Pubnub\Pubnub;

/**
 * Class Broadcaster
 *
 * @package Nodes\Services\Pubnub\Broadcasting
 */
class Broadcaster implements IlluminateContractBroadcaster
{
    /**
     * Pubnub SDK instance
     *
     * @var \Pubnub\Pubnub
     */
    protected $pubnub;

    /**
     * Broadcaster constructor
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  \Pubnub\Pubnub $pubnub
     */
    public function __construct(Pubnub $pubnub)
    {
        $this->pubnub = $pubnub;
    }

    /**
     * Broadcast the given event
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  array  $channels
     * @param  string $event
     * @param  array  $payload
     * @return void
     */
    public function broadcast(array $channels, $event, array $payload = [])
    {
        foreach ($channels as $channel) {
            $this->pubnub->publish($channel, [
                'event' => $event,
                'data' => $payload
            ]);
        }
    }
}