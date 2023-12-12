<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');

$routes->get('/news', 'News::index');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/my-profile', 'Dashboard::myProfile');
$routes->post('/dashboard/my-profile', 'Registration::update');
$routes->post('/dashboard/my-profile/change-password', 'Registration::changePassword');

$routes->get('/dashboard/user', 'User::index');
$routes->get('/dashboard/user/detail/(:segment)', 'User::detail/$1');
$routes->post('/dashboard/user/detail/(:segment)', 'User::change/$1');
$routes->get('/dashboard/user/detail/remove/(:num)', 'User::remove/$1');

$routes->post('/home/contactSave', 'Contact::save');
$routes->get('/dashboard/contact', 'Contact::index');
$routes->get('/dashboard/contact/detail/(:num)', 'Contact::detail/$1');
$routes->get('/dashboard/contact/detail/remove/(:num)', 'Contact::remove/$1');

$routes->get('/dashboard/news', 'News::index');

$routes->get('/registration/register', 'Registration::register');
$routes->post('/registration/register', 'Registration::save');
$routes->get('/registration/login', 'Registration::login');
$routes->post('/registration/login', 'Registration::take');
$routes->post('/registration/logout', 'Registration::logout');

$routes->setAutoRoute(true);
