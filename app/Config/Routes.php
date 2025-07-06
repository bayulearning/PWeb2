<?php

use App\Filters\Auth;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/page/tos', 'Page::tos');
$routes->get('artikel/index', 'Artikel::index');
$routes->get('artikel/index_admin', 'Artikel::indexadmin');
$routes->get('artikel/form_add', 'Artikel::add');
$routes->get('user/login', 'User::login');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
$routes->post('user/login', 'User::login');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
$routes->get('artikel', 'Artikel::admin_index');
$routes->add('artikel/add', 'Artikel::add');
$routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
$routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});