<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('bank', ['namespace' => 'App\Modules\Bank\Controllers'], function($subroutes){

	/*** Route for bank ***/
	$subroutes->add('add_bank', 'Bank::bdtask_0001_bank_form');
	$subroutes->add('add_bank/(:num)', 'Bank::bdtask_0001_bank_form/$1');
	$subroutes->add('edit_bank/(:num)', 'Bank::bdtask_0001_bank_form/$1');
	$subroutes->add('delete_bank/(:num)', 'Bank::delete_bank/$1');
	$subroutes->add('bank_list', 'Bank::index');
	$subroutes->add('bank_checkdata', 'Bank::bdtask_CheckbankList');
	
	
});

