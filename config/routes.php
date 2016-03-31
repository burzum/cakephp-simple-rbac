<?php
use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::scope('/rbac', function ($routes) {

	$routes->connect('/:controller', ['plugin' => 'Burzum/SimpleRbac']);
	$routes->connect('/:controller/:action', ['plugin' => 'Burzum/SimpleRbac']);

});
