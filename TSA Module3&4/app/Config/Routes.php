<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');

$routes->get('tasks', 'Tasks::index');
$routes->get('tasks/new', 'Tasks::new');
$routes->post('tasks/create', 'Tasks::create');

$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('tasks/update/(:num)', 'Tasks::update/$1');
$routes->post('tasks/delete/(:num)', 'Tasks::delete/$1');

$routes->get('profile', 'Profile::index');
$routes->get('about', 'About::index');

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::index');
$routes->get('logout', 'Login::logout');