<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('manufacturer', ['namespace' => 'App\Modules\Manufacturer\Controllers'], function($subroutes){

	/*** Route for Manufacturer ***/
	$subroutes->add('add_manufacturer', 'Manufacturer::bdtask_0001_manufacturer_form');
	$subroutes->add('add_manufacturer/(:num)', 'Manufacturer::bdtask_0001_manufacturer_form/$1');
	$subroutes->add('edit_manufacturer/(:num)', 'Manufacturer::bdtask_0001_manufacturer_form/$1');
	$subroutes->add('delete_manufacturer/(:num)', 'Manufacturer::delete_manufacturer/$1');
	$subroutes->add('manufacturer_list', 'Manufacturer::index');
	$subroutes->add('manufacturer_checkdata', 'Manufacturer::bdtask_CheckmanufacturerList');
	$subroutes->add('manufacturer_ledger', 'Manufacturer::bdtask_02_manufacturer_ledger');
	$subroutes->add('upload_manufacturer', 'Manufacturer::importFile');
	
	
});

