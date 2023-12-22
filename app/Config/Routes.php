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
$routes->get('/dashboard/product/create', 'Product::create');
$routes->post('/dashboard/product/create', 'Product::save');
$routes->get('/dashboard/product/detail/(:segment)', 'Product::detail/$1');
$routes->post('/dashboard/product/detail/(:segment)', 'Product::update/$1');
$routes->get('/dashboard/product/detail/delete/(:num)', 'Product::delete/$1');

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

// dashboard order list
$routes->get('/product/order/(:num)', 'Order::save/$1');
$routes->get('/dashboard/order-list', 'Order::list');
$routes->get('/dashboard/order-list/detail/(:num)', 'Order::detail/$1');
$routes->post('/dashboard/order-list/detail/(:num)', 'Order::update/$1');

// dashboard my order
$routes->get('/dashboard/my-order', 'Order::myOrder');
$routes->get('/dashboard/my-order/delete/(:num)', 'Order::delete/$1');

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
