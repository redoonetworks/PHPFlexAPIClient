<?php
namespace FlexAPI;

use FlexAPI\Manager\ActionsManager;
use FlexAPI\Manager\ExportManager;
use FlexAPI\Manager\FieldManager;
use FlexAPI\Manager\ListingManager;
use FlexAPI\Manager\ModuleManager;
use FlexAPI\Manager\RecordManager;
use FlexAPI\Manager\SearchManager;
use FlexAPI\Manager\MenuManager;
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

    public function forget_password($username, $email) {
        $response = $this->_Request->post('login/forget_password', array('username' => $username, 'email' => $email));

        var_dump($response);
    }

    public function login($username, $password) {
        $response = $this->_Request->post('login/login', array('username' => $username, 'password' => $password));

        if(isset($response['token'])) {
            var_dump($response['token']);
            $this->setLogintoken($response['token']);
        }
    }

    public function offline_token($token) {
        $this->_Request->get('login/offline_token', array('token' => $token));
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
     * @return MenuManager
     */
    public function menu() {
        return new MenuManager($this);
    }
    /**
     * @return SearchManager
     */
    public function search() {
        return new SearchManager($this);
    }
    /**
     * @return ActionsManager
     */
    public function actions() {
        return new ActionsManager($this);
    }
    /**
     * @return ExportManager
     */
    public function exports() {
        return new ExportManager($this);
    }
    /**
     * @return ListingManager
     */
    public function listing() {
        return new ListingManager($this);
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