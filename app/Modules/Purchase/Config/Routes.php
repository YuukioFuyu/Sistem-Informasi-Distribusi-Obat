<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('purchase', ['namespace' => 'App\Modules\Purchase\Controllers'], function($subroutes){

	/*** Route for Purchase ***/
	$subroutes->add('add_purchase', 'Purchase::bdtask_0001_purchase_form');
	$subroutes->add('product_search_bymanufacturer', 'Purchase::product_search_by_manufacturer');
	$subroutes->add('product_details_by_id', 'Purchase::retrieve_product_data');
	$subroutes->add('purchase_list', 'Purchase::index');
	$subroutes->add('purchase_list_check', 'Purchase::bdtask_CheckpurchaseList');
	$subroutes->add('purchase_details/(:num)', 'Purchase::bdtask_002m_purchase_details/$1');
	$subroutes->add('purchase_edit/(:num)', 'Purchase::bdtask_003m_purchase_edit/$1');
	$subroutes->add('delete_purchase/(:num)', 'Purchase::delete_purchase/$1');
	
    $subroutes->add('purchase_update', 'Purchase::bdtask_004m_purchase_update');
	
});

