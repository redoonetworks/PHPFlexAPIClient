<?php
ini_set('display_errors', 1);
error_reporting(-1);

require_once('app/bootstrap.php');
require_once('config.php');


$client = new \FlexAPI\Client(VTIGER_URL);


//$response = $client->forget_password('Test98', 'test98@stefanwarnat.de');

//var_dump($response);
//exit();

if(defined('VT_EXISTING_TOKEN') && VT_EXISTING_TOKEN != '') {
    $client->setLogintoken(VT_EXISTING_TOKEN);
} else {
    $token = $client->login(VT_USERNAME, VT_PASSWORD);
    var_dump($token);exit();
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
//$result = $client->records()->getRelatedRecords('Accounts', 691, 'Contacts');

/**
 *  Function to get the menu with groupings
 */	
//$result = $client->menu()->get();

/**
 * Function to get list view of module
 */
//$result = $client->listing()->getListing('Accounts', array('limit' => 30, 'page' => 1));

//$result = $client->listing()->getListing('Accounts', array('limit' => 30, 'page' => 1));

//$result = $client->listing()->getListingCvId('Accounts', 6, array('limit' => 30, 'page' => 1));

//$result = $client->listing()->getListing('Accounts', array('fields' => array('website', 'phone', 'accountname')));

//$result = $client->listing()->getListing('Accounts', array('fields' => array('accountname', 'industry'), 'condition' => array(array('industry','=','Banking'))));

//$result = $client->exports()->getExportOptions('Quotes');

$result = $client->exports()->exportFile('Quotes', 1481, 'interface#pdfgenerator#1693');

file_put_contents(dirname(__FILE__) . '/download.pdf', $result);
var_dump($result);