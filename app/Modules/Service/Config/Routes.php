<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('service', ['namespace' => 'App\Modules\Service\Controllers'], function($subroutes){

	/*** Route for service ***/
    $subroutes->add('add_service', 'Service::bdtask_0001_service_form');
    $subroutes->add('add_service/(:num)', 'Service::bdtask_0001_service_form/$1');
    $subroutes->add('edit_service/(:num)', 'Service::bdtask_0001_service_form/$1');
	$subroutes->add('service_list', 'Service::index');
	$subroutes->add('delete_service/(:num)', 'Service::delete_service/$1');
	$subroutes->add('service_invoice_form', 'Service::bdtask_service_invoice_form');
	$subroutes->add('search_service', 'Service::retrieve_service_info');
	$subroutes->add('service_details_data', 'Service::retrieve_service_details');
    $subroutes->add('service_invoice_list', 'Service::service_invoice_list');
	$subroutes->add('check_invoicelist', 'Service::bdtask_Checkservice_invoiceList');
	$subroutes->add('edit_service_invoice/(:any)', 'Service::edit_service_invoice/$1');
    $subroutes->add('update_service_invoice', 'Service::update_service_invoice');
	$subroutes->add('service_invoice_details/(:any)', 'Service::service_invoice_details/$1');
    $subroutes->add('delete_service_invoice/(:any)', 'Service::delete_service_invoice/$1');
    

});

