<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('medicine', ['namespace' => 'App\Modules\Medicine\Controllers'], function($subroutes){

	/*** Route for Medicine and related ***/
	$subroutes->add('add_category', 'Category::bdtask_0001_category_form');
	$subroutes->add('add_category/(:num)', 'Category::bdtask_0001_category_form/$1');
	$subroutes->add('edit_category/(:num)', 'Category::bdtask_0001_category_form/$1');
	$subroutes->add('delete_category/(:num)', 'Category::delete_category/$1');
	$subroutes->add('category_list', 'Category::index');

    /***  unit part ***/
	$subroutes->add('add_unit', 'Units::bdtask_0001_unit_form');
	$subroutes->add('add_unit/(:num)', 'Units::bdtask_0001_unit_form/$1');
	$subroutes->add('edit_unit/(:num)', 'Units::bdtask_0001_unit_form/$1');
	$subroutes->add('delete_unit/(:num)', 'Units::delete_unit/$1');
	$subroutes->add('unit_list', 'Units::index');
	
	  /***  type part ***/
	$subroutes->add('add_type', 'Types::bdtask_0001_type_form');
	$subroutes->add('add_type/(:num)', 'Types::bdtask_0001_type_form/$1');
	$subroutes->add('edit_type/(:num)', 'Types::bdtask_0001_type_form/$1');
	$subroutes->add('delete_type/(:num)', 'Types::delete_type/$1');
	$subroutes->add('type_list', 'Types::index');
	
	 /***  Medicine part ***/
	$subroutes->add('add_medicine', 'Medicine::bdtask_0001_medicine_form');
	$subroutes->add('add_medicine/(:num)', 'Medicine::bdtask_0001_medicine_form/$1');
	$subroutes->add('medicine_list', 'Medicine::index');
	$subroutes->add('medicine_checkdata', 'Medicine::bdtask_CheckmedicineList');
	$subroutes->add('edit_medicine/(:any)', 'Medicine::bdtask_0001_medicine_form/$1');
	$subroutes->add('delete_medicine/(:any)', 'Medicine::delete_medicine/$1');
	$subroutes->add('barCode/(:any)', 'Medicine::bdtask_003_barcode_generate/$1');
	$subroutes->add('qrCode/(:any)', 'Medicine::bdtask_004_qrcode_generate/$1');
    $subroutes->add('upload_medicine', 'Medicine::importFile');
    $subroutes->add('leaf_setting', 'Leaf_pattern::index');
	$subroutes->add('add_leaf_setting', 'Leaf_pattern::bdtask_0001_leaf_form');
	$subroutes->add('add_leaf_setting/(:num)', 'Leaf_pattern::bdtask_0001_leaf_form/$1');
	$subroutes->add('delete_leaf/(:any)', 'Leaf_pattern::delete_leaf/$1');
	
});

