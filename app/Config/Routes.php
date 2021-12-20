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
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/* namspaces */

if (!defined('ADMIN_NAMESPACE')) {
    define('ADMIN_NAMESPACE', 'App\Controllers\Administration');
}
if (!defined('PUBLIC_SECTION_NAMESPACE')) {
    define('PUBLIC_SECTION_NAMESPACE', 'App\Controllers\PublicSection');
}
if (!defined('COMMAND_NAMESPACE')) {
    define('COMMAND_NAMESPACE', 'App\Controllers\Command');
}
if (!defined('API_REST_NAMESPACE')) {
    define('API_REST_NAMESPACE', 'App\Controllers\Rest');
}

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'LoginController::index',['as' => 'login', 'filter' => 'login_auth', 'namespace' => PUBLICSECTION_NAMESPACE]);

//-------- Normal routes ------------------------

$routes->group('', function ($routes) {
    $routes->get('/', 'LoginController::index', ['as' => 'login', 'filter' => 'login_auth', 'namespace' => PUBLIC_SECTION_NAMESPACE]);
    $routes->get('home', 'HomeController::index', ['as' => 'home_public', 'filter' => 'public_auth', 'namespace' => PUBLIC_SECTION_NAMESPACE]);
});

$routes->group('admin', function ($routes) {
    $routes->get('home', 'HomeController::index', ['as' => 'home_admin', 'filter' => 'private_auth', 'namespace' => ADMIN_NAMESPACE]);
});

$routes->post('/checkLogin', 'LoginController::checkLogin', ['as' => 'check_login', 'namespace' => PUBLIC_SECTION_NAMESPACE]);

//-----------------------------------------------

//------- Command routes ------------------------

$routes->group('commands', function ($routes) {
    $routes->cli('pokemon', 'CommandController::commandPokemon', ['namespace' => COMMAND_NAMESPACE]);
    $routes->cli('feedVillena', 'CommandController::commandFeedVillena', ['namespace' => COMMAND_NAMESPACE]);
});

//-----------------------------------------------

//------- Api Rest routes -----------------------

$routes->group('rest', function ($routes) {
    $routes->get('category/(:any)', 'CategoriesController::getCategory/$1', ['namespace' => API_REST_NAMESPACE]);
    $routes->get('category', 'CategoriesController::getCategory', ['namespace' => API_REST_NAMESPACE]);
    $routes->delete('category', 'CategoriesController::deleteCategory', ['namespace' => API_REST_NAMESPACE]);
    $routes->post('category', 'CategoriesController::saveCategory', ['namespace' => API_REST_NAMESPACE]);
});

//-----------------------------------------------


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. EnvironmentPUBLI_CSECTION_NAMESPACE
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
