<?php
namespace FlexAPI\Manager;

class RecordManager extends BaseManager
{
    /**
     * @param $moduleName
     * @return array with fields
     */
    public function getRecord($moduleName, $crmid) {
        $response = $this->getClient()->request()->get('records/get/'.$moduleName.'/'.$crmid);

        return $response;
    }
}