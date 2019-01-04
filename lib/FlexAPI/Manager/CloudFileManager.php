<?php
namespace FlexAPI\Manager;

class CloudFileManager extends BaseManager
{
    /**
     * @param $moduleName
     * @return array with fields
     */
    public function getFieldFileInfo($crmid, $fieldname) {

        $response = $this->getClient()->request()->get('cloudfile/fieldlinkinfo/'.$crmid.'/'.$fieldname);

        return $response;
    }

    /**
     * @param $moduleName
     * @return array with fields
     */
    public function getFieldFileContent($crmid, $fieldname) {

        $response = $this->getClient()->request()->get('cloudfile/fieldlink/'.$crmid.'/'.$fieldname);

        return $response;
    }

    public function getRelations($crmid) {
        $response = $this->getClient()->request()->get('cloudfile/relations/'.$crmid);

        return $response;
    }

}