<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');

$routes->get('/news', 'News::index');

$routes->get('/dashboard/user', 'User::user');
$routes->get('/dashboard/user/create', 'User::create');
$routes->post('/dashboard/user/create', 'User::save');
$routes->get('/dashboard/user/edit/(:num)', 'User::edit/$1');
$routes->post('/dashboard/user/edit/(:num)', 'User::update/$1');
$routes->get('/dashboard/user/delete/(:num)', 'User::delete/$1');

$routes->post('/home/contactSave', 'Contact::save');
$routes->get('/dashboard/contact', 'Contact::index');

$routes->setAutoRoute(true);
