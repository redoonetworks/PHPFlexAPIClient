<?php
namespace FlexAPI\Manager;

class SearchManager extends BaseManager
{
    public function simpleSearch($queryString, $moduleName = '') {
        $response = $this->getClient()->request()->get('search/simple', array('query' => $queryString, 'module' => $moduleName));

        return $response;
    }

}