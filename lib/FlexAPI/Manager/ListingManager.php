<?php
namespace FlexAPI\Manager;

class ListingManager extends BaseManager
{
    /**
     * @param $moduleName
     * @return array with records
     */
    public function getListing($moduleName, $options = array()) {
        $response = $this->getClient()->request()->get('listing/list/'.$moduleName, $options);

        return $response;
    }

    /**
     * @param $moduleName
     * @return array with records
     */
    public function getListingCvId($moduleName, $customviewId, $options = array()) {
        $response = $this->getClient()->request()->get('listing/list/'.$moduleName.'/'.$customviewId, $options);

        return $response;
    }

}