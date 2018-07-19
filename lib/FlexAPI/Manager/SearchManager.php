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

}