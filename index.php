<?php
ini_set('display_errors', 1);
error_reporting(-1);

require_once('app/bootstrap.php');
require_once('config.php');


$client = new \FlexAPI\Client(VTIGER_URL);

if(defined('VT_EXISTING_TOKEN') && VT_EXISTING_TOKEN != '') {
    $client->setLogintoken(VT_EXISTING_TOKEN);
} else {
    $token = $client->login(VT_USERNAME, VT_PASSWORD);
}


/**
 * Get available Modulelist
 *
 * With
 * id => ModuleName
 * title => Label
 * icon => Icon to show
 */
//$moduleList = $client->modules()->getAll();

/**
 * Get List with Blocks & Fields with all fields to a module for DetailView
 */
//$fields = $client->fields()->getFields("Accounts", "DetailView");

/**
 * Will generate an array with main module structure
 *
 * @var $structure array
 */
//$structure = $client->modules()->getStructure("Accounts");

/**
 * To run a simple Fulltextsearch use this (optionally within a single module)
 */
//$result = $client->search()->simpleSearch('Company');
//$result = $client->search()->simpleSearch('Company', 'Accounts');

/**
 * To read a record by ID
 */
//$result = $client->records()->getRecord('Accounts', 691);

/**
 * To edit a record by ID
 */
 /*
$result = $client->records()->setRecord('Accounts', 691, array(
    'description' => date('Y-m-d H:i:s')
));
*/

/**
 * Function return list of relations
 */
//$result = $client->records()->getRelationlist('Accounts', 691);

/**
 * Function return list of relations
 */
//$result = $client->records()->getComments('Accounts', 691);

/**
 * Function return list of related records
 */
$result = $client->records()->getRelatedRecords('Accounts', 691, 'Contacts');

var_dump($result);