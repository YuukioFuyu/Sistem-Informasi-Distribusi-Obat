<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('tax', ['namespace' => 'App\Modules\Tax\Controllers'], function($subroutes){

	/*** Route for tax ***/
	$subroutes->add('tax_setting', 'Tax::bdtask_tax_settings');
	$subroutes->add('save_tax_setting', 'Tax::create_tax_settins');
	$subroutes->add('update_tax_setting', 'Tax::tax_settings_updateform');
	$subroutes->add('update_taxs', 'Tax::update_tax_settins');
	$subroutes->add('add_income_tax', 'Tax::bdtask_income_tax');
	$subroutes->add('save_income_tax', 'Tax::bdtask_create_income_tax');
    $subroutes->add('income_tax_list', 'Tax::manage_income_tax');
    $subroutes->add('income_tax_list/(:num)', 'Tax::edit_income_tax/$1');
    $subroutes->add('update_income_tax', 'Tax::update_income_tax');
    $subroutes->add('delete_income_tax/(:num)', 'Tax::delete_income_tax/$1');
 
});

