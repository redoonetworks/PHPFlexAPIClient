<?php
namespace FlexAPI\Manager;

class ExportManager extends BaseManager
{
    /**
     * @param $moduleName
     * @param $crmid
     * @return array with export grouped options
     */
    public function getExportOptions($moduleName, $crmid = '') {

        if(empty($crmid)) {
            $response = $this->getClient()->request()->get('export/options/' . $moduleName);
        } else {
            $response = $this->getClient()->request()->get('export/options/' . $moduleName . '/' . $crmid);
        }

        return $response;
    }

    /**
     * @param $moduleName   string
     * @param $crmIds   array|int
     * @param $exportIds array|string
     * @return string
     */
    public function exportFile($moduleName, $crmIds, $exportIds) {

        $response = $this->getClient()->request()->get('export/get', array(
            'modulename' => $moduleName,
            'crmids' => $crmIds,
            'exportids' => $exportIds
        ), true);

        return $response;
    }

}