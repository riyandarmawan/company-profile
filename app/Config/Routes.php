<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');

$routes->get('/news', 'News::index');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/dashboard/user', 'User::index');

$routes->post('/home/contactSave', 'Contact::save');
$routes->get('/dashboard/contact', 'Contact::index');

$routes->get('/registration/register', 'registration::register');
$routes->post('/registration/register', 'registration::save');
$routes->get('/registration/login', 'registration::login');
$routes->post('/registration/login', 'registration::take');
$routes->post('/registration/logout', 'registration::logout');

$routes->setAutoRoute(true);
