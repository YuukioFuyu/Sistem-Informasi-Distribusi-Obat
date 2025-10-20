<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('autoupdate', ['namespace' => 'App\Modules\Autoupdate\Controllers'], function($subroutes){


	/*** Route for autoupdate ***/
	$subroutes->add('autoupdate', 'Autoupdate::index');
	$subroutes->add('checkserver', 'Autoupdate::checkserver');		
	$subroutes->add('update', 'Autoupdate::update');
	$subroutes->add('updatenow', 'Autoupdate::updatenow');
	$subroutes->add('cancel_notification', 'Autoupdate::cancel_notification');
	
});
