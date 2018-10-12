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
    var_dump($token);
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
//$fields = $client->fields()->getFields("Accounts", "EditView");
//$fields = $client->fields()->getFields("Events", "EditView");

/**
 * Will generate an array with main module structure
 *
 * @var $structure array
 */

/*
$structure = $client->modules()->getStructure("Accounts");
*/

/**
 * To run a simple Fulltextsearch use this (optionally within a single module)
 */
//$result = $client->search()->simpleSearch('Company');
//$result = $client->search()->simpleSearch('Company', 'Accounts');

$result = $client->search()->complexeSearch(
    'Contacts',
    array(array('firstname', 'c', '%a%')),
    array('firstname', 'lastname'),
    array('account_id' => array('accountname', 'bill_city')),
    0,
    50,
    array('lastname' => 'ASC')
);

//$result = $client->search()->radiusSearch(48.424353, 9.2545066, 50);

/**
 * To read a record by ID
 */
//$result = $client->records()->getRecord('Accounts', 691);
//$result = $client->records()->getRecord('Events', 1569);

/**
 * To edit a record by ID
 */
/*
$result = $client->records()->setRecord('Accounts', 691, array(
    'description' => date('Y-m-d H:i:s')
));
*/
/*
$result = $client->records()->createRecord('Accounts', array(
    'accountname' => 'Text over API '.date('Y-m-d H:i:s'),
    'description' => date('Y-m-d H:i:s')
));
*/
/*
$result = $client->records()->createRecord('Contacts', array(
    'firstname' => 'Vorname',
    'lastname' => 'Nachname',
));
*/
//$result = $client->records()->createRecord('Events', array(
//    'subject' => 'Text over API '.date('Y-m-d H:i:s'),
//    'date_start' => date('Y-m-d', time() + 86400),
//    'time_start' => date('H:i:s', time() + 86400),
//    'due_date' => date('Y-m-d', time() + 86400 + 7200),
//    'time_end' => date('H:i:s', time() + 86400 + 7200),
//    'activitytype' => 'Call',
//    'visibility' => 'Public',
//));


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
//$result = $client->records()->getRelatedRecords('Stellenanzeigen', 1901, 'Contacts', array('firstname', 'lastname'));
//$result = $client->records()->getRelatedRecords('Accounts', 691, 'Contacts');

/**
 * Function return list of related records by relation id
 */
//$result = $client->records()->getRelatedRecords('Accounts', 691, 'Contacts', 1);

/**
 *  Function to get the menu with groupings
 */	
//$result = $client->menu()->get();

/**
 * Function to get list view of module
 */
//$result = $client->listing()->getListing('Accounts', array('limit' => 30, 'page' => 1));

//$result = $client->listing()->getListing('Accounts', array('limit' => 30, 'page' => 1));

//$result = $client->listing()->getListingCvId('Accounts', 6, array('limit' => 30, 'page' => 1, 'fields' => 2));

//$result = $client->listing()->getListing('Accounts', array('fields' => array('website', 'phone', 'accountname')));

//$result = $client->listing()->getListing('Accounts', array('fields' => array('accountname', 'industry'), 'condition' => array(array('industry','=','Banking'))));

//$result = $client->listing()->getListing('Events', array('fields' => array('subject', 'date_start', 'time_start', 'due_date', 'time_end', 'activitytype'), 'condition' => array(array('date_start','bw','2018-01-01,2018-02-01'))));

//$result = $client->exports()->getExportOptions('Quotes');

//$result = $client->exports()->exportFile('Quotes', 1481, 'interface#pdfgenerator#1693');


//file_put_contents(dirname(__FILE__) . '/download.pdf', $result);

//$result = $client->home()->getHome();

echo '<pre>';
var_dump($result);