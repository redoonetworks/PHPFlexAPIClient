<?php
namespace FlexAPI\Manager;

class RecordManager extends BaseManager
{
    /**
     * @param $moduleName
     * @return array with fields
     */
    public function getRecord($moduleName, $crmid) {
        $response = $this->getClient()->request()->get('records/'.$moduleName.'/'.$crmid);

        return $response;
    }

    public function setRecord($moduleName, $crmid, $fieldsToChange) {
        if(empty($fieldsToChange)) {
            return false;
        }

        $response = $this->getClient()->request()->post('records/set/'.$moduleName.'/'.$crmid, array('fields' => $fieldsToChange));

        return $response;
    }
    public function createRecord($moduleName, $fieldsToSet) {
        if(empty($fieldsToSet)) {
            return false;
        }

        $response = $this->getClient()->request()->post('records/create/'.$moduleName, array('fields' => $fieldsToSet));

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
	public function getRelatedRecords($moduleName, $crmid, $relatedModule, $relationId = 0, $fields = array()) {
        if(is_array($relationId)) {
            $fields = $relationId;
            $relationId = 0;
        }
        if(empty($relationId)) {
            $response = $this->getClient()->request()->get('records/relations/' . $moduleName . '/' . $crmid . '/' . $relatedModule, array('fields' => $fields));
        } else {
            $response = $this->getClient()->request()->get('records/relations/' . $moduleName . '/' . $crmid . '/' . $relatedModule . '/' . $relationId, array('fields' => $fields));
        }

        return $response;
	}
}