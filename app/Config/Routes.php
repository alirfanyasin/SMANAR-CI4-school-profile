<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->get('Admin_smanar/add_blog', 'Admin_smanar/Blog::add_blog');
$routes->get('Admin_smanar/aHR0cDovL2xvY2FsaG9zdDo4MDgwL0FkbWluX3NtYW5hci9hZGRfYmxvZw==', 'Admin_smanar/Blog::add_blog');

$routes->get('Admin_smanar/profile_admin', 'Admin_smanar/Profile::profile_admin');
$routes->get('Admin_smanar/kepala_sekolah', 'Admin_smanar/Tampilan::kepala_sekolah');
$routes->get('Admin_smanar/wakasek', 'Admin_smanar/Tampilan::wakasek');
$routes->get('Admin_smanar/jml_penghuni', 'Admin_smanar/Tampilan::jml_penghuni');
$routes->get('Admin_smanar/ekskul', 'Admin_smanar/Tampilan::ekskul');
$routes->get('Admin_smanar/gallery', 'Admin_smanar/Tampilan::gallery');
$routes->get('Admin_smanar/alumni', 'Admin_smanar/Tampilan::alumni');
$routes->get('Admin_smanar/hub_kam', 'Admin_smanar/Tampilan::hub_kam');


// FRONT ROUTER
$routes->get('ppdb/aHR0cDovL2xvY2FsaG9zdDo4MDgwL3BwZGIvdmVyaWZpa2FzaV9rb2RlX3BlbmRhZnRhcmFu', 'PPDB::verifikasi_kode_pendaftaran');
// $routes->get('ppdb/aHR0cDovL2xvY2FsaG9zdDo4MDgwL3BwZGIvZm9ybXVsaXJfcGVuZGFmdGFyYW4=', 'PPDB::formulir_pendaftaran');

// $routes->get('Admin_smanar/Blog/(:segment)', 'Admin_smanar/Blog::detail/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
