<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', function() { return redirect()->to('/login'); });
$routes->get('/login',  'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'DashboardController::index');

    $routes->get('medicines/(:num)/delete', 'MedicineController::delete/$1');
    $routes->resource('medicines', ['controller' => 'MedicineController']);

    $routes->get('batches/(:num)/delete', 'BatchController::delete/$1');
    $routes->get('batches/(:num)/edit',   'BatchController::edit/$1');
    $routes->resource('batches', ['controller' => 'BatchController']);

    $routes->get('suppliers/(:num)/delete', 'SupplierController::delete/$1');
    $routes->resource('suppliers', [
        'controller' => 'SupplierController',
        'filter'     => 'role:superadmin,manager',
    ]);

    $routes->get('users/(:num)/delete', 'UserController::delete/$1');
    $routes->resource('users', [
        'controller' => 'UserController',
        'filter'     => 'role:superadmin',
    ]);
});

$routes->group('api', function($routes) {
    $routes->get('medicines',        'Api\MedicineApiController::index');
    $routes->get('medicines/(:num)', 'Api\MedicineApiController::show/$1');
});