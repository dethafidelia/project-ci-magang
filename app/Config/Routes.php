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
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');




use App\Controllers\Gereja;

$routes->get('gereja', 'Gereja::index');
// $routes->match(['get', 'post'], 'gereja/login', [Gereja::class, 'login']);
$routes->match(['get', 'post'], 'gereja/check', [Gereja::class, 'check']);
$routes->get('logout', 'Gereja::logout');

use App\Controllers\Home;

$routes->get('home', 'Home::index');

use App\Controllers\Agenda;

$routes->get('agenda', 'Agenda::index');
$routes->get('agenda/getAllAgenda', 'Agenda::getAllAgenda');
$routes->post('agenda/submit', 'Agenda::submit'); // Rute untuk menangani pengiriman formulir


// $routes->get('proyek-kp/lpj/(:segment)', 'LpjController::showFile/$1');


use App\Controllers\Monev;

$routes->get('monev', 'Monev::index');
$routes->get('monev/getAllMonev', 'Monev::getAllMonev');

$routes->get('laporan', 'Laporan::index');

use App\Controllers\HomeAdmin;

$routes->get('homeAdmin', 'HomeAdmin::index');

use App\Controllers\DPPH;

$routes->get('dpph', 'DPPH::index');
$routes->get('dpph/getAllUser', 'DPPH::getAllUser');
$routes->post('dpph/submit', 'DPPH::submit');

use App\Controllers\Register;

$routes->get('register', 'Register::index');
// $routes->get('register/getAllUser', 'Register::getAllUser');
// $routes->post('register/submit', 'Register::submit'); // Rute untuk menangani pengiriman formulir

use App\Controllers\HomeSBR;

$routes->get('homeSBR', 'HomeSBR::index');

use App\Controllers\AgendaSBR;

$routes->get('agendaSBR', 'AgendaSBR::index');
$routes->get('agendaSBR/getAllAgenda', 'AgendaSBR::getAllAgenda');

use App\Controllers\MonevSBR;

$routes->get('monevSBR', 'MonevSBR::index');
$routes->get('monevSBR/getAllMonev', 'MonevSBR::getAllMonev');

use App\Controllers\BidangController;

// $routes->get('bidang', 'Bidang::index');
// $routes->get('bidang/getAllBidang', 'Bidang::getAllBidang');
$routes->get('bidang', 'BidangController::index');
$routes->get('bidang/getAllBidang', 'BidangController::getAllBidang');
// $routes->get('bidang/getTimPelayananByBidang/(:num)', 'BidangController::getTimPelayananByBidang/$1');

use App\Controllers\TimpelController;

$routes->get('timpel/getAllTimPelayanan', 'TimpelController::getAllTimPelayanan');
$routes->get('timpel/getById', 'TimpelController::getTimpelById');

// $routes->get('timpel/getAllTimPelayanan', 'Timpel::getAllTimPelayanan');
// $routes->get('timpel/getAllTimPelayanan', 'Bidang::getAllTimPelayanan');

use App\Controllers\Programasi;

$routes->get('programasi', 'Programasi::index');



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
