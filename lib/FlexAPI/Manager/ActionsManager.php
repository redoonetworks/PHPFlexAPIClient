<?php
namespace FlexAPI\Manager;

class ActionsManager extends BaseManager
{
    /**
     * @param $moduleName
     * @return array with fields
     */
    public function getRecord($moduleName, $crmid) {
        $response = $this->getClient()->request()->get('records/get/'.$moduleName.'/'.$crmid);

        return $response;
    }

    public function setRecord($moduleName, $crmid, $fieldsToChange) {
        if(empty($fieldsToChange)) {
            return false;
        }

        $response = $this->getClient()->request()->post('records/set/'.$moduleName.'/'.$crmid, array('fields' => $fieldsToChange));

        return $response;
    }

    public function getRelationlist($moduleName, $crmid) {
        $response = $this->getClient()->request()->get('records/relations/list/'.$moduleName.'/'.$crmid, array());

        return $response;
    }
    public function getComments($moduleName, $crmid) {
        $response = $this->getClient()->request()->get('records/comments/'.$moduleName.'/'.$crmid, array());

        return $response;
    }
    public function getRelatedRecords($moduleName, $crmid, $relatedModule) {
        $response = $this->getClient()->request()->get('records/relations/'.$moduleName.'/'.$crmid.'/'.$relatedModule, array());

        return $response;
    }
}