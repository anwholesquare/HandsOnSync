<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/asl/quiz', 'Home::quiz');
$routes->get('/asl/learn', 'Home::learn');


$routes->get('/token', 'Home::generate');
$routes->get('/register', 'Home::register');
$routes->post('/register/store', 'Home::store');
$routes->post('/register_success', 'Home::register_sucess');

$routes->get('/login', 'Home::login');
$routes->post('/login/authenticate', 'Home::authenticate');

$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/dashboard/leaderboard', 'Home::leaderboard');

$routes->get('/user/(:any)', 'Home::showuser/$1');

$routes->get('/api/score/(:any)', 'Home::setscore/$1');
$routes->get('/api/word/(:any)', 'Home::learntword/$1');


$routes->get('/logout', 'Home::logout');

