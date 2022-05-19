<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Auth::dashboard');

//user
if (session()->get('hak_akses') == 'APA') {
	$routes->get('/data_user/view', 'dt_user::view_user');

	$routes->get('/delete_user/(:segment)', 'dt_user::delete/$1');
	$routes->get('/data_user/input', 'dt_user::go_inputuser');
	$routes->get('/go_ubahuser/(:segment)', 'dt_user::go_edituser/$1');
	$routes->get('/ubah_user/(:segment)', 'dt_user::ubahuser/$1');
} else {
	$routes->get('/data_user/view', 'Auth::gagal');
	$routes->get('/delete_user/(:segment)', 'Auth::gagal');
	$routes->get('/data_user/input', 'Auth::gagal');
	$routes->get('/go_ubahuser/(:segment)', 'Auth::gagal');
	$routes->get('/ubah_user/(:segment)', 'Auth::gagal');
}
$routes->get('/user/profil', 'dt_user::profil');
//supplier
$routes->get('/data_supplier/view', 'dt_supplier::viewsupplier');
$routes->get('/delete_supplier/(:segment)', 'dt_supplier::delete/$1');
$routes->get('/data_supplier/input', 'dt_supplier::inputsupplier');
// $routes->get('/data_supplier/ubah', 'dt_supplier::ubahsupplier');
$routes->get('/ubah_supplier/(:segment)', 'dt_supplier::go_ubahsupplier/$1');

//data obat
$routes->get('/data_obat/view', 'dt_obat::viewobat');
$routes->get('/delete_obat/(:segment)', 'dt_obat::delete/$1');
$routes->get('/data_obat/input', 'dt_obat::inputobat');
$routes->get('/data_obat/ubah', 'dt_obat::ubahobat');
$routes->get('/ubah_obat/(:segment)', 'dt_obat::ubahobat/$1');

//obat masuk
$routes->get('/obat_masuk/view', 'ob_masuk::view_ob_masuk');
$routes->get('/obat_masuk/input', 'ob_masuk::input_ob_masuk');
$routes->get('/hapus_obat/(:segment)', 'ob_masuk::delete/$1');
$routes->get('/hapus_dtobat/(:segment)', 'ob_masuk::hapus_ob_masuk/$1');
$routes->get('/detail_dtobat/(:segment)', 'ob_masuk::detail_ob_masuk/$1');

//obat keluar
$routes->get('/obat_keluar/view', 'ob_keluar::view');
$routes->get('/obat_keluar/input', 'ob_keluar::input_ob_keluar');
$routes->get('/hapus_dump/(:segment)', 'ob_keluar::delete/$1');
$routes->get('/hapus_obat_keluar/(:segment)', 'ob_keluar::hapus_ob_keluar/$1');
$routes->get('/detail_obat_keluar/(:segment)', 'ob_keluar::detail_ob_keluar/$1');

//laporan
$routes->get('/lap_stok/view', 'laporan_stok::view_lap_stok');
$routes->get('/lap_obmasuk/view', 'laporan_masuk::view_lap_masuk');
$routes->get('/lap_obkeluar/view', 'laporan_keluar::view_lap_keluar');

//lupa password
$routes->get('/lupa_password', 'Auth::lupa');
$routes->get('/ubah_password', 'Auth::ubahpas');

/**
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
