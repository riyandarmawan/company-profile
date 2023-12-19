<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// home
$routes->get('/', 'Home::index');

// product
$routes->get('/product', 'Product::index');
$routes->get('/dashboard/product', 'Product::table');

// news
$routes->get('/news', 'News::index');
$routes->get('/news/(:segment)', 'News::read/$1');
$routes->get('/dashboard/news', 'News::table');
$routes->get('/dashboard/news/create', 'News::create');
$routes->post('/dashboard/news/create', 'News::save');
$routes->get('/dashboard/news/detail/(:segment)', 'News::detail/$1');
$routes->post('/dashboard/news/detail/(:segment)', 'News::update/$1');
$routes->get('/dashboard/news/detail/delete/(:num)', 'News::delete/$1');

// dashboard profile
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/my-profile', 'Dashboard::myProfile');
$routes->post('/dashboard/my-profile', 'Registration::update');
$routes->post('/dashboard/my-profile/change-password', 'Registration::changePassword');
$routes->get('/dashboard/my-profile/remove/(:num)', 'Registration::remove/$1');

// dashboard user
$routes->get('/dashboard/user', 'User::index');
$routes->get('/dashboard/user/detail/(:segment)', 'User::detail/$1');
$routes->post('/dashboard/user/detail/(:segment)', 'User::change/$1');
$routes->get('/dashboard/user/detail/remove/(:num)', 'User::remove/$1');

// dashboard contact
$routes->post('/home/contactSave', 'Contact::save');
$routes->get('/dashboard/contact', 'Contact::index');
$routes->get('/dashboard/contact/detail/(:num)', 'Contact::detail/$1');
$routes->get('/dashboard/contact/detail/remove/(:num)', 'Contact::remove/$1');

// registration
$routes->get('/registration/register', 'Registration::register');
$routes->post('/registration/register', 'Registration::save');
$routes->get('/registration/login', 'Registration::login');
$routes->post('/registration/login', 'Registration::take');
$routes->get('/registration/logout', 'Registration::logout');

$routes->setAutoRoute(true);
