<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('stock', ['namespace' => 'App\Modules\Stock\Controllers'], function($subroutes){

	/*** Route for stock ***/

	$subroutes->add('stock_list', 'Stock::index');
	$subroutes->add('stock_list_batchWise', 'Stock::batch_wise_stock');
	$subroutes->add('stock_checkdata', 'Stock::bdtask_CheckstockList');
	$subroutes->add('stock_checkdata_batchwise', 'Stock::Checkbatchstock');
	$subroutes->add('available_stock', 'Stock::available_stock');
	$subroutes->add('check_available_stock', 'Stock::Check_available_stock');
	
});


