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
$routes->setDefaultController('Login');
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
$routes->get('/', 'Login::index');
$routes->post('auth', 'Login::auth');
$routes->get('calculator', 'Home::calculator');

//-----------Super Admin/Admin-------------//
$routes->get('super_admin', 'SuperAdmin::index',['filter' => 'auth']);
$routes->get('add_company', 'SuperAdmin::add_company',['filter' => 'auth']);
$routes->get('add_company/(:num)', 'SuperAdmin::add_company/$1',['filter' => 'auth']);
$routes->post('add_company_action', 'SuperAdmin::add_company_action',['filter' => 'auth']);
$routes->match(['get','post'],'company_list', 'SuperAdmin::company_list',['filter' => 'auth']);
$routes->get('delete_company/(:num)', 'SuperAdmin::delete_company/$1',['filter' => 'auth']);




//-----------User------------//
$routes->get('dashboard', 'User::index',['filter' => 'auth']);
$routes->get('add_contact', 'User::add_contact',['filter' => 'auth']);
$routes->get('add_contact/(:num)', 'User::add_contact/$1',['filter' => 'auth']);
$routes->post('add_conntact_action', 'User::add_conntact_action',['filter' => 'auth']);
$routes->get('delete_contact/(:num)', 'User::delete_contact/$1',['filter' => 'auth']);



//-----------Logout-------------//
$routes->get('logout', 'SuperAdmin::logout');




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
