<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get( '/books', 'Book::index' );

$routes->get( '/books/create', 'Book::create' );
$routes->post( '/books/create', 'Book::create' );

$routes->get( '/books/edit/(:num)', 'Book::edit/$1' );
$routes->post( '/books/edit/(:num)', 'Book::edit/$1' );

$routes->get( '/books/delete/(:num)', 'Book::delete/$1' );

