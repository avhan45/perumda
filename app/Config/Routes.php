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
$routes->get('/', 'Home::login');
$routes->get('/dashboard', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('logout', 'Home::logout');
$routes->get('/user', 'Home::user');
$routes->post('proses_login', 'Home::proses_login');

// Route Laporan
$routes->group('laporan', function ($routes) {
    $routes->get('/', 'LaporanController::index');
    $routes->get('pdf', 'LaporanController::laporanPDF');
    $routes->get('xl', 'LaporanController::laporanXl');
});

// Route Pasar
$routes->group('pasar', function ($routes) {
    $routes->get('/', 'PasarController::index');
    $routes->get('export', 'PasarController::export');
    $routes->get('import', 'PasarController::importData');
    $routes->get('create', 'PasarController::create');
    $routes->post('store', 'PasarController::store');
    $routes->get('edit/(:any)', 'PasarController::edit/$1');
    $routes->post('update', 'PasarController::update');
    $routes->get('delete/(:any)', 'PasarController::delete/$1');
});

// Route Blok
$routes->group('blok', function ($routes) {
    $routes->get('/', 'BlokController::index');
    $routes->post('store', 'BlokController::store');
    $routes->get('edit/(:num)', 'BlokController::edit/$1');
    $routes->post('update', 'BlokController::update');
    $routes->get('delete/(:num)', 'BlokController::delete/$1');
});

// Route Klasifikasi
$routes->group('klasifikasi', function ($routes) {
    $routes->get('/', 'KlasifikasiController::index');
    $routes->get('create', 'KlasifikasiController::create');
    $routes->post('store', 'KlasifikasiController::store');
    $routes->get('edit/(:num)', 'KlasifikasiController::edit/$1');
    $routes->post('update/(:num)', 'KlasifikasiController::update/$1');
    $routes->get('delete/(:num)', 'KlasifikasiController::delete/$1');
});

// Route Pedagang 
$routes->group('pedagang', function ($routes) {
    $routes->get('/', 'PedagangController::index');
    $routes->get('create', 'PedagangController::create');
    $routes->get('export', 'PedagangController::export');
    $routes->post('store', 'PedagangController::store');
    $routes->get('edit/(:num)', 'PedagangController::edit/$1');
    $routes->post('update/(:num)', 'PedagangController::update/$1');
    $routes->get('delete/(:num)', 'PedagangController::delete/$1');
    $routes->get('download', 'PedagangController::download');
});


// Route Sertifikat
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
