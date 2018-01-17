<?php
namespace FlexAPI\Manager;

class FieldManager extends BaseManager
{
    /**
     * @param $moduleName
     * @return array with fields
     */
    public function getFields($moduleName, $view) {
        $response = $this->getClient()->request()->get('fields/get/'.$moduleName.'/'.$view);

        return $response;
    }
}