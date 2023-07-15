<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/dashboard', 'Home::index');
$routes->get('/laporan', 'LaporanController::index');
$routes->get('/laporan/pdf', 'LaporanController::laporanPDF');
$routes->get('/laporan/xl', 'LaporanController::laporanXl');
$routes->get('/', 'Home::login');
$routes->get('/pasar', 'PasarController::index');
$routes->get('/pasar/create', 'PasarController::create');
$routes->post('/pasar/store', 'PasarController::store');
$routes->get('/pasar/edit/(:any)', 'PasarController::edit/$1');
$routes->post('/pasar/update', 'PasarController::update');
$routes->get('/pasar/delete/(:any)', 'PasarController::delete/$1');

$routes->get('blok', 'BlokController::index');
$routes->get('/blok/create', 'BlokController::create');
$routes->post('/blok/store', 'BlokController::store');
$routes->get('/blok/edit/(:num)', 'BlokController::edit/$1');
$routes->post('/blok/update', 'BlokController::update');
$routes->get('/blok/delete/(:num)', 'BlokController::delete/$1');


$routes->get('/klasifikasi', 'KlasifikasiController::index');
$routes->get('/klasifikasi/create', 'KlasifikasiController::create');
$routes->post('/klasifikasi/store', 'KlasifikasiController::store');
$routes->get('/klasifikasi/edit/(:num)', 'KlasifikasiController::edit/$1');
$routes->post('/klasifikasi/update/(:num)', 'KlasifikasiController::update/$1');
$routes->get('/klasifikasi/delete/(:num)', 'KlasifikasiController::delete/$1');


$routes->get('/pedagang', 'PedagangController::index');
$routes->get('/pedagang/create', 'PedagangController::create');
$routes->post('/pedagang/store', 'PedagangController::store');
$routes->get('/pedagang/edit/(:num)', 'PedagangController::edit/$1');
$routes->post('/pedagang/update/(:num)', 'PedagangController::update/$1');
$routes->get('/pedagang/delete/(:num)', 'PedagangController::delete/$1');


$routes->group('sertifikat', function ($routes) {
    $routes->get('/', 'SertifikatController::index');
    $routes->get('create', 'SertifikatController::create');
    $routes->post('store', 'SertifikatController::store');
    $routes->get('edit/(:num)', 'SertifikatController::edit/$1');
    $routes->post('update/(:num)', 'SertifikatController::update/$1');
    $routes->get('delete/(:num)', 'SertifikatController::delete/$1');
});

/*

 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
