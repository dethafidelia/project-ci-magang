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
$routes->get('/', 'Gereja::index');
// $routes->get('login', 'Login::index');




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
$routes->get('rencana/getAllRencana', 'Monev::getAllRencana');
$routes->get('realisasi/getAllRealisasi', 'Monev::getAllRealisasi');
$routes->get('realisasi/edit/(:segment)', 'Realisasi::editRealisasi/$1');

$routes->get('laporan', 'Laporan::index');
$routes->get('laporan/getAllLaporan', 'Laporan::getAllLaporan');

use App\Controllers\HomeAdmin;

$routes->get('homeAdmin', 'HomeAdmin::index');

use App\Controllers\DPPH;

$routes->get('dpph', 'DPPH::index');
$routes->get('dpph/getAllUser', 'DPPH::getAllUser');
$routes->post('dpph/submit', 'DPPH::submit');
$routes->post('dpph/edit', 'DPPH::edit');
$routes->post('dpph/update', 'DPPH::update');
$routes->post('dpph/delete', 'DPPH::delete');



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
$routes->get('agenda/cari', 'Programasi::cari');



// Route Baru

$routes->post('login/proses', 'Gereja::check');




$routes->get('dpph/delete/user/(:any)', 'DPPH::delete/$1');
$routes->post('dpph/add/user', 'DPPH::prosesAddUser');
$routes->get('dpph/edit/user/(:any)', 'DPPH::viewEditUser/$1');
$routes->post('dpph/edit/user/proses', 'DPPH::editProses');

$routes->post('agenda/save/proses', 'Agenda::saveAgenda');
$routes->get('agenda/detail/(:any)', 'Agenda::detailProgramsi/$1');

$routes->get('monev/detail/(:any)', 'Monev::detailMonev/$1');
$routes->get('monev/edit/(:any)', 'Monev::editMonevRealisasi/$1');
$routes->post('monev/edit/proses', 'Monev::editMonevRealisasiProses');
$routes->get('monev/add/catatan/(:any)', 'Monev::addNotes/$1');
$routes->post('monev/add/catatan/proses', 'Monev::addNotesProses/$1');

$routes->get('Admin/Bidang-Timpel', 'HomeAdmin::bidtim');
$routes->post('Admin/Bidang/add', 'HomeAdmin::addBidang');
$routes->post('Admin/Timpel/add', 'HomeAdmin::addTimpel');
$routes->get('Admin/bidang/delete/(:any)', 'HomeAdmin::deleteBidang/$1');
$routes->get('Admin/timpel/delete/(:any)', 'HomeAdmin::deleteTimpel/$1');

$routes->get('agenda/cariData', 'Agenda::cariData');
$routes->get('agenda/cari-data/realisasi', 'Agenda::cariDataRealisasi');
$routes->get('agenda/exportExcel', 'Agenda::exportExcel');
$routes->get('agenda/cari-data/rencana', 'Agenda::cariDataRencana');











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
