<?php
namespace FlexAPI\Manager;

class ModuleManager extends BaseManager
{
    public function getAll() {
        $response = $this->getClient()->request()->get('modules/list');

        return $response;
    }

    public function getStructure($moduleName) {
        $response = $this->getClient()->request()->get('modules/'.$moduleName);

        return $response;
    }
}