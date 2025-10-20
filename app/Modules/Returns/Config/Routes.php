<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('return', ['namespace' => 'App\Modules\Returns\Controllers'], function($subroutes){

	/*** Route for Return ***/
	$subroutes->add('add_return', 'Return_Controller::bdtask_0001_retrun_form');
	$subroutes->add('return_invoice_form', 'Return_Controller::bdtask_002m_invoice_return_form');
    $subroutes->add('save_invoice_return', 'Return_Controller::save_invoice_return');
    $subroutes->add('invoice_return_details/(:num)', 'Return_Controller::invoice_return_details/$1');
    $subroutes->add('invoice_return_list', 'Return_Controller::invoice_return_list');
    $subroutes->add('checkinvoice_returnlist', 'Return_Controller::bdtask_CheckinvoiceretrunList');
    $subroutes->add('manufacturer_return_form', 'Return_Controller::bdtask_supplier_return');
    $subroutes->add('save_manufacturer_return', 'Return_Controller::save_manufacturer_return');
    $subroutes->add('manufacturer_return_list', 'Return_Controller::manufacturer_return_list');
    $subroutes->add('checkmanufacturer_returnlist', 'Return_Controller::bdtask_CheckmanufacturerretrunList');
    $subroutes->add('manufacturer_return_details/(:num)', 'Return_Controller::manufacturer_return_details/$1');
    $subroutes->add('wastage_return_list', 'Return_Controller::wastage_return_list');
    $subroutes->add('checkwastage_returnlist', 'Return_Controller::bdtask_CheckwastageretrunList');
    
 
});

