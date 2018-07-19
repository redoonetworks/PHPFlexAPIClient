<?php
namespace FlexAPI\Manager;

class HomeManager extends BaseManager
{
    /**
     * @return array with home data
     */
    public function getHome() {

        $response = $this->getClient()->request()->get('home');

        return $response;
    }


}