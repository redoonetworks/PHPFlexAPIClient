<?php
namespace FlexAPI\Manager;

class MenuManager extends BaseManager
{
    /**
     * @param $moduleName
     * @return array with fields
     */
    public function get() {
        $response = $this->getClient()->request()->get('menu/get');

        return $response;
    }
}