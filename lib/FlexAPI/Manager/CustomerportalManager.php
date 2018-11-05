<?php
namespace FlexAPI\Manager;

class CustomerportalManager extends BaseManager
{
    /**
     * @param $moduleName
     * @return array with fields
     */
    public function login($email, $password) {

        $response = $this->getClient()->request()->post(
            'customerportal/login',
            array(
                'email' => $email,
                'password' => $password
            )
        );

        return $response;
    }
}