<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');
$routes->get('/news', 'News::index');
$routes->get('/home/contactSave', 'Home::contactSave');

$routes->setAutoRoute(true);
