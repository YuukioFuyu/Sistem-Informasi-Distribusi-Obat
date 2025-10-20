<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('report', ['namespace' => 'App\Modules\Report\Controllers'], function($subroutes){

	/*** Route for report ***/
	$subroutes->add('add_closing', 'Report::bdtask_0001_closing_form');
	$subroutes->add('closing_list', 'Report::closing_list');
	$subroutes->add('getclosing_data', 'Report::bdtask_CheckclosingList');
    $subroutes->add('sales_report', 'Report::sales_report');
    $subroutes->add('getsales_reportList', 'Report::bdtask_ChecksalesreportList');
    $subroutes->add('userwise_sales_report', 'Report::userwise_sales_report');
    $subroutes->add('getuserwise_sales_reportList', 'Report::bdtask_CheckuserwisesalesreportList');
	$subroutes->add('productwise_sales_report', 'Report::productwise_sales_report');
    $subroutes->add('getproductwise_sales_reportList', 'Report::bdtask_CheckproductwisesalesreportList');
    $subroutes->add('categorywise_sales_report', 'Report::categorywise_sales_report');
    $subroutes->add('getcategorywise_sales_reportList', 'Report::bdtask_CheckcategorywisesalesreportList');
    $subroutes->add('purchase_report', 'Report::purchase_report');
    $subroutes->add('getpurchase_reportList', 'Report::bdtask_CheckpurchasereportList');
    $subroutes->add('purchase_report_categorywise', 'Report::categorywise_purchase_report');
    $subroutes->add('get_categorywise_purchaselist', 'Report::bdtask_CheckcategorywisepurchasereportList');


});

