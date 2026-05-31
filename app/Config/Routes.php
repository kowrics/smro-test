<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', function() { return redirect()->to('/login'); });
$routes->get('/login',  'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'DashboardController::index');

    $routes->resource('medicines', ['controller' => 'MedicineController']);
    $routes->resource('batches',   ['controller' => 'BatchController']);

    $routes->resource('suppliers', [
        'controller' => 'SupplierController',
        'filter'     => 'role:superadmin,manager',
    ]);

    $routes->resource('users', [
        'controller' => 'UserController',
        'filter'     => 'role:superadmin',
    ]);
});

$routes->group('api', function($routes) {
    $routes->get('medicines',       'Api\MedicineApiController::index');
    $routes->get('medicines/(:num)', 'Api\MedicineApiController::show/$1');
});