<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Komik::home');
$routes->get('/Pages/about', 'Pages::about');
$routes->get('/Pages/contact', 'Pages::contact');

$routes->get('/Komik', 'Komik::index');
$routes->get('/Komik/create', 'Komik::create');
$routes->post('komik/save', 'Komik::save');

$routes->post('/komik/update/(:num)', 'Komik::update/$1');
$routes->get('/komik/edit/(:segment)', 'Komik::edit/$1');
$routes->get('/komik/(:any)', 'Komik::detail/$1');

$routes->delete('/komik/(:num)', 'Komik::delete/$1');


// $routes->get('/komik/delete/(:segment)', 'Komik::delete/$1');
$routes->get('/Komik/(:segment)', 'Komik::detail/$1');
// $routes->get('/Komik/create', 'Komik::create');
// $routes->get('/komik/save', 'Komik::save');