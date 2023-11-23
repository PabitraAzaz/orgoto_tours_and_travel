<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Web
$routes->get('/', 'Home::index');
$routes->get('tour-details/(:any)', 'Home::tourdetails/$1');
$routes->match(['get', 'post'], 'contact-us', 'Home::cotactUs');
$routes->get('about-us', 'Home::aboutUs');
$routes->match(['get', 'post'], 'thank-you/(:num)', 'Home::bookTour/$1');


// Admin Panel Routes 

$routes->group('admin', function ($routes) {
    $routes->match(['get', 'post'], '/', 'AdminController\LoginController::index');
    $routes->get('dashboard/', 'AdminController\DashboardController::index');


    $routes->group('categories', function ($routes) {
        $routes->get('/', 'AdminController\CategoryController::index');
        $routes->match(['get', 'post'], 'create/', 'AdminController\CategoryController::create');
        // $routes->match(['get', 'post'], 'edit/(:num)', 'AdminController\CategoryController::edit/$1');
        $routes->get('delete/(:num)', 'AdminController\CategoryController::delete/$1');
    });


    $routes->group('tours', function ($routes) {
        $routes->get('/', 'AdminController\TourController::index');
        $routes->match(['get', 'post'], 'create/', 'AdminController\TourController::create');
        $routes->match(['get', 'post'], 'edit/(:num)', 'AdminController\TourController::edit/$1');
        $routes->get('delete/(:num)', 'AdminController\TourController::delete/$1');
    });


    $routes->group('accomodations/(:num)', function ($routes) {
        $routes->get('/', 'AdminController\AccomodationController::index/$1');
        $routes->match(['get', 'post'], 'create/', 'AdminController\AccomodationController::create/$1');
        $routes->match(['get', 'post'], 'edit/(:num)/', 'AdminController\AccomodationController::edit/$1/$2');
        $routes->get('delete/(:num)', 'AdminController\AccomodationController::delete/$1/$2');
    });

    $routes->group('itineraries/(:num)', function ($routes) {
        $routes->get('/', 'AdminController\ItinerariesController::index/$1');
        $routes->match(['get', 'post'], 'create/', 'AdminController\ItinerariesController::create/$1');
        $routes->match(['get', 'post'], 'edit/(:num)/', 'AdminController\ItinerariesController::edit/$1/$2');
        $routes->get('delete/(:num)', 'AdminController\ItinerariesController::delete/$1/$2');
    });

    $routes->group('places/(:num)', function ($routes) {
        $routes->get('/', 'AdminController\PlacesController::index/$1');
        $routes->match(['get', 'post'], 'create/', 'AdminController\PlacesController::create/$1');
        $routes->match(['get', 'post'], 'edit/(:num)/', 'AdminController\PlacesController::edit/$1/$2');
        $routes->get('delete/(:num)', 'AdminController\PlacesController::delete/$1/$2');
    });

    $routes->group('review', function ($routes) {
        $routes->get('/', 'AdminController\ReviewController::index');
        $routes->match(['get', 'post'], 'create/', 'AdminController\ReviewController::create');
        $routes->match(['get', 'post'], 'edit/(:num)/', 'AdminController\ReviewController::edit/$1');
        $routes->get('delete/(:num)', 'AdminController\ReviewController::delete/$1');
    });

    $routes->group('booking', function ($routes) {
        $routes->get('/', 'AdminController\DashboardController::tour_book');
        $routes->get('delete/(:num)', 'AdminController\DashboardController::delete_booking/$1');
    });


    $routes->get('logout', 'AdminController\DashboardController::logout');
    $routes->get('message', 'AdminController\DashboardController::message');
});
