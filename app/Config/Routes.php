<?php

use App\Filters\Auth;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/home', 'Page::home');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/page/tos', 'Page::tos');
$routes->get('artikel/index', 'Artikel::index');
$routes->get('artikel/index_admin', 'Artikel::indexadmin');
$routes->get('artikel/form_add', 'Artikel::add');

$routes->get('/pengumuman/(:any)', 'Artikel::view_berita/$1');
$routes->get('/user_detail/(:any)', 'Artikel::view_user/$1');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');
$routes->post('user/logout', 'User::logout');


$routes->group('admin', ['filter' => 'auth'], function($routes) {

$routes->get('artikel', 'Artikel::admin_index');
$routes->add('artikel/add', 'Artikel::add');
$routes->add('artikel/pengumuman', 'Artikel::pengumuman');
$routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
$routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});