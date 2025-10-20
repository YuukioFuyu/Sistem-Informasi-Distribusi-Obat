<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('invoice', ['namespace' => 'App\Modules\Invoice\Controllers'], function($subroutes){

	/*** Route for invoice ***/
	$subroutes->add('add_invoice', 'Invoice::bdtask_0001_invoice_form');
	$subroutes->add('pos_invoice', 'Invoice::bdtask_0002_pos_invoice_form');
	$subroutes->add('search_customer', 'Invoice::search_customers');
	$subroutes->add('get_posdata', 'Invoice::pos_setup');
	$subroutes->add('get_batch_stock', 'Invoice::retrieve_product_batchid');
	$subroutes->add('customer_previous', 'Invoice::previous');
	$subroutes->add('get_item_by_category', 'Invoice::getitemlist');
	$subroutes->add('get_medicine_by_name', 'Invoice::getmedicine_byname');
	$subroutes->add('save_pos_sale', 'Invoice::bdtask_0002_pos_invoice_form');
    $subroutes->add('invoice_list', 'Invoice::index');
	$subroutes->add('invoice_list_check', 'Invoice::bdtask_CheckinvoiceList');
	$subroutes->add('invoice_details/(:num)', 'Invoice::bdtask_002m_invoice_details/$1');
	$subroutes->add('pos_print/(:num)', 'Invoice::bdtask_005_invoice_pos_print/$1');
	$subroutes->add('instant_customer', 'Invoice::bdtask_006_instant_customer');
    $subroutes->add('search_medicine', 'Invoice::autocompleteproductsearch');
    $subroutes->add('medicine_details_data', 'Invoice::retrieve_product_data_inv');
    $subroutes->add('invoice_edit/(:num)', 'Invoice::bdtask_003m_invoice_edit/$1');
    $subroutes->add('invoice_update', 'Invoice::bdtask_003m_invoice_edit');
    $subroutes->add('delete_invoice/(:num)', 'Invoice::delete_invoice/$1');
    
	
	
});


