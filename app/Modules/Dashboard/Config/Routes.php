<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('dashboard', ['namespace' => 'App\Modules\Dashboard\Controllers'], function($subroutes){

	/*** Route for Dashboard ***/
    $subroutes->add('', 'Dashboard::index');
	$subroutes->add('home', 'Dashboard::index');
	$subroutes->add('login', 'Auth::index');
	$subroutes->add('setting', 'Dashboard::setting');
	$subroutes->add('add_setting', 'Dashboard::update_setting');
	$subroutes->add('language', 'Language::index');
	$subroutes->add('labels', 'Language::CheckLabelList');
	$subroutes->add('add_language', 'Language::addLanguage');
	$subroutes->add('edit_phrase/(:any)', 'Language::editPhrase/$1');
	$subroutes->add('update_phrase', 'Language::addLebel');
	$subroutes->add('phrases', 'Language::phrase');
	$subroutes->add('add_phrase', 'Language::addPhrase');
    $subroutes->add('expired_medicine', 'Dashboard::date_expired_medicine');
    $subroutes->add('check_expired_medicine', 'Dashboard::bdtask_checkexpired_medicine');
    $subroutes->add('stockout_medicine', 'Dashboard::stockout_medicine');
    $subroutes->add('check_stockout_medicine', 'Dashboard::bdtask_checkstockout_medicine');
    $subroutes->add('my_profile', 'Dashboard::my_profile');
    $subroutes->add('modaldisplay', 'Dashboard::modaldisplay');
    $subroutes->add('panel_setting', 'Panel_setting::panel_color_setting');
    $subroutes->add('update_panel_setting', 'Panel_setting::update_color_setting');
    $subroutes->add('backup_download', 'Backup_restore::download');
    $subroutes->add('restore_database', 'Backup_restore::restore_form');
    $subroutes->add('db_import', 'Backup_restore::import_form');
    $subroutes->add('importdata', 'Backup_restore::importdata');
    $subroutes->add('restore', 'Backup_restore::restore');
});
$routes->group('auth', ['namespace' => 'App\Modules\Dashboard\Controllers'], function($subroutes){

	/*** Route for Dashboard ***/
	$subroutes->add('login', 'Auth::index');
	$subroutes->get('mail_test', 'User::send_usermail_test');

});
$routes->group('user', ['namespace' => 'App\Modules\Dashboard\Controllers'], function($subroutes){

	/*** Route for user ***/
	$subroutes->add('add_user', 'User::add_user');
	$subroutes->add('edit_user/(:num)', 'User::add_user/$1');
	$subroutes->add('delete_user/(:num)', 'User::delete_user/$1');
	$subroutes->get('user_list', 'User::index');
	

});

$routes->group('currency', ['namespace' => 'App\Modules\Dashboard\Controllers'], function($subroutes){

	/*** Route for user ***/
	$subroutes->add('add_currency', 'Currency::bdtask_0001_currency_form');
	$subroutes->add('add_currency/(:num)', 'Currency::bdtask_0001_currency_form/$1');
	$subroutes->add('edit_currency/(:num)', 'Currency::bdtask_0001_currency_form/$1');
	$subroutes->add('delete_currency/(:num)', 'Currency::delete_currency/$1');
	$subroutes->get('currency_list', 'Currency::index');
	

});

$routes->group('role', ['namespace' => 'App\Modules\Dashboard\Controllers'], function($subroutes){
	$subroutes->add('add_module', 'Permission::module_form');
	$subroutes->add('save_module', 'Permission::add_module');
	$subroutes->add('add_menu', 'Permission::menu_form');
	$subroutes->add('save_menu', 'Permission::add_menu');
	$subroutes->add('add_role', 'Permission::add_role');
	$subroutes->add('save_role', 'Permission::create');
	$subroutes->add('role_list', 'Permission::role_list');
	$subroutes->add('delete_role/(:num)', 'Permission::role_delete/$1');
	$subroutes->add('edit_role/(:num)', 'Permission::edit_role/$1');
	$subroutes->add('update_role', 'Permission::update');
	$subroutes->add('assign_role', 'Permission::user_assign');
	$subroutes->add('check_exist/(:num)', 'Permission::select_to_rol/$1');
	$subroutes->add('add_roleto_user', 'Permission::assing_roleuser');

});
