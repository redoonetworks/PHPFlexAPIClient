<?php
namespace FlexAPI\Manager;

class ActivityStreamManager extends BaseManager
{
    /**
     * @param $limit
     * @param $offset
     * @param $filter array or arrays
     *      possible keys within inner array:
     *          crmid - array of ids
     *          module - array of record modules
     *          type - array of entry type keys to show
     *
     * @return array with fields
     */
    public function getEntries($filter = array(), $limit = 10, $offset = 0) {

        $params = array(
            'offset' => $offset,
            'limit' => $limit,
            'filter' => $filter,
        );
        $response = $this->getClient()->request()->get('timeline/entries', $params);

        return $response;
    }


}