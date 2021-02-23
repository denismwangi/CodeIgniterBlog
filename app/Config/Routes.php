<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->get('/', 'Pages::index');
$routes->get('/blog/create', 'Blog::create');
$routes->get('/blog/add', 'Blog::add');
$routes->get('/blog/delete/(:num)', 'Blog::delete/$1');
$routes->get('/blog/edit/(:num)', 'Blog::edit/$1');
$routes->get('/blog/update/(:num)', 'Blog::update/$1');
$routes->get('/blog/view/(:num)', 'Blog::view/$1');



$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/profile', 'Dashboard::profile');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->get('/auth/register_user', 'Auth::register_user');
$routes->get('/auth/login_user', 'Auth::login_user');



$routes->get('(:any)', 'Pages::about/$1');

//protected routes
$routes->group('',['filter' =>'AuthCheck'], function($routes){



});
$routes->group('',['filter' =>'LoggedIn'], function($routes){
	

});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
