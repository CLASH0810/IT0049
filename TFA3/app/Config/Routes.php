<?php

$routes->get('/', 'Pages::index');
$routes->get('about', 'Pages::about');
$routes->get('customers', 'Customers::index');
$routes->get('users', 'Users::index');

$routes->get('customers/new', 'Customers::create');
$routes->post('customers/new', 'Customers::create');

$routes->get('users/new', 'Users::create');
$routes->post('users/new', 'Users::create');

$routes->get('customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('customers/edit/(:num)', 'Customers::edit/$1');

$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/edit/(:num)', 'Users::edit/$1');