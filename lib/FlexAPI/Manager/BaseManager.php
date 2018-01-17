<?php


namespace FlexAPI\Manager;


use FlexAPI\Client;

class BaseManager
{
    /**
     * @var Client
     */
    private $_Client = null;

    public function __construct(Client $client) {
        $this->_Client = $client;
    }

    protected function getClient() {
        return $this->_Client;
    }

}