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


// HOME
$routes->get('/', 'Home::index');

// BTS
$routes->get('/bts','Home::bts');
$routes->post('/bts','Home::bts');
$routes->post('/bts/tambahBTS','Home::tambahBTS');
$routes->post('/bts/updateBTS','Home::updateBTS');

// Gangguan
$routes->get('/gangguan','Home::gangguan');
$routes->post('/gangguan','Home::gangguan');
$routes->post('/gangguan/tambahGangguan','Home::tambahGangguan');


// Paket
$routes->get('/paket','Home::paket');
$routes->post('/paket','Home::paket');
$routes->post('/paket/tambahPaket','Home::tambahPaket');
$routes->post('/paket/updatePaket','Home::updatePaket');


// Perangkat
$routes->get('/perangkat','Home::perangkat');
$routes->post('/perangkat','Home::perangkat');
$routes->post('/perangkat/tambahPerangkat','Home::tambahPerangkat');
$routes->post('/perangkat/updatePerangkat','Home::updatePerangkat');
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
