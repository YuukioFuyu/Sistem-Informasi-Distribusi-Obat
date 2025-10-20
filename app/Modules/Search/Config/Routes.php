<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('search', ['namespace' => 'App\Modules\Search\Controllers'], function($subroutes){

	/*** Route for search ***/
	$subroutes->add('medicine_search', 'Search::bdtask_0001_medicine_search_form');
	$subroutes->add('invoice_search', 'Search::bdtask_0002_invoice_search_form');
	$subroutes->add('purchase_search', 'Search::bdtask_0003_purchase_search_form');

});

