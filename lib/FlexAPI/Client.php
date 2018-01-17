<?php
namespace FlexAPI;

use FlexAPI\Manager\FieldManager;
use FlexAPI\Manager\ModuleManager;
use FlexAPI\Manager\RecordManager;
use FlexAPI\Manager\SearchManager;
use FlexAPI\Utils\Request;

class Client
{

    /**
     * @var Request
     */
    private $_Request = null;

    /**
     * Client constructor.
     *
     * @param $VtigerURL
     */
    public function __construct($VtigerURL) {
        $this->_Request = new Request($VtigerURL);
    }

    public function setLogintoken($token) {
        $this->_Request->setLogintoken($token);
    }

    public function login($username, $password) {
        $response = $this->_Request->post('login/login', array('username' => $username, 'password' => $password));

        if(isset($response['token'])) {
            var_dump($response['token']);
            $this->setLogintoken($response['token']);
        }
    }

    /**
     * @return Request
     */
    public function request() {
        return $this->_Request;
    }

    /**
     * @return ModuleManager
     */
    public function modules() {
        return new ModuleManager($this);
    }
    /**
     * @return SearchManager
     */
    public function search() {
        return new SearchManager($this);
    }

    /**
     * @return RecordManager
     */
    public function records() {
        return new RecordManager($this);
    }

    /**
     * @return FieldManager
     */
    public function fields() {
        return new FieldManager($this);
    }
}