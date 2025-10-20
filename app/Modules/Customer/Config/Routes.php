<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('customer', ['namespace' => 'App\Modules\Customer\Controllers'], function($subroutes){

	/*** Route for Customer ***/
	$subroutes->add('add_customer', 'Customer::bdtask_customer_form');
	$subroutes->add('add_customer/(:num)', 'Customer::bdtask_customer_form/$1');
	$subroutes->add('edit_customer/(:num)', 'Customer::bdtask_customer_form/$1');
	$subroutes->add('delete_customer/(:num)', 'Customer::delete_customer/$1');
	
	$subroutes->add('customer_list', 'Customer::index');
	$subroutes->add('customer_checkdata', 'Customer::bdtask_CheckcustomerList');
	$subroutes->add('credit_customer', 'Customer::bdtask_02_credit_customer');
	$subroutes->add('credit_customer_checkdata', 'Customer::bdtask_003creditCustomer_checkdata');

	$subroutes->add('paid_customer', 'Customer::bdtask_004_paid_customer');
	$subroutes->add('paid_customer_checkdata', 'Customer::bdtask_004paidCustomer_checkdata');

	$subroutes->add('edit_customer/(:num)', 'Customer::bdtask_customer_form/$1');
	$subroutes->add('customer_ledger', 'Customer::bdtask_05_customer_ledger');

	
});

