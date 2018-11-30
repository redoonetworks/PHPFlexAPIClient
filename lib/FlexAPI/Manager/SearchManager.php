<?php
namespace FlexAPI\Manager;

class SearchManager extends BaseManager
{
    public function simpleSearch($queryString, $moduleName = '') {
        $response = $this->getClient()->request()->get('search/simple', array('query' => $queryString, 'module' => $moduleName));

        return $response;
    }

    public function radiusSearch($lat, $lng, $radius = 50) {
        $response = $this->getClient()->request()->get('search/radius', array('lat' => $lat, 'lng' => $lng, 'radius' => $radius));

        return $response;
    }

    public function complexeSearch($moduleName, $condition, $fields, $referenceFields, $offset = 0, $limit = 30, $orderByFields = array()) {
        $response = $this->getClient()->request()->get('search/complexe', array(
            'limit' => $limit,
            'orderby' => $orderByFields,
            'offset' => $offset,
            'referencefields' => $referenceFields,
            'condition' => $condition,
            'fields' => $fields,
            'module' => $moduleName
        ));

        return $response;
    }
}