<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =====================================================
// Public Routes
// =====================================================
$routes->get('/', 'Home::index');

// =====================================================
// Auth Routes (Guest Only)
// =====================================================
$routes->group('', ['filter' => 'guest'], static function ($routes) {
    $routes->get('login', 'Auth\AuthController::login');
    $routes->post('login', 'Auth\AuthController::attemptLogin');
});

// Logout (requires auth)
$routes->get('logout', 'Auth\AuthController::logout', ['filter' => 'auth']);

// =====================================================
// User Routes (Authenticated)
// =====================================================
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'User\DashboardController::index');

    // Profile
    $routes->get('profile', 'User\ProfileController::index');
    $routes->post('profile/update', 'User\ProfileController::update');
    $routes->post('profile/change-password', 'User\ProfileController::changePassword');

    // My Assets
    $routes->get('my-assets', 'User\AssetController::index');
    $routes->get('my-assets/(:num)', 'User\AssetController::show/$1');

    // Tickets
    $routes->get('tickets', 'User\TicketController::index');
    $routes->get('tickets/create', 'User\TicketController::create');
    $routes->post('tickets', 'User\TicketController::store');
    $routes->get('tickets/(:num)', 'User\TicketController::show/$1');
    $routes->post('tickets/(:num)/response', 'User\TicketController::addResponse/$1');
    $routes->post('tickets/(:num)/close', 'User\TicketController::close/$1');

    // Vehicle Booking
    $routes->get('vehicle-booking', 'User\VehicleBookingController::index');
    $routes->get('vehicle-booking/create', 'User\VehicleBookingController::create');
    $routes->post('vehicle-booking', 'User\VehicleBookingController::store');
    $routes->get('vehicle-booking/(:num)', 'User\VehicleBookingController::show/$1');
    $routes->post('vehicle-booking/(:num)/cancel', 'User\VehicleBookingController::cancel/$1');

    // Knowledge Base
    $routes->get('knowledge-base', 'User\ArticleController::index');
    $routes->get('knowledge-base/(:segment)', 'User\ArticleController::show/$1');

    // Settings
    $routes->get('settings', 'User\SettingsController::index');
    $routes->post('settings/update', 'User\SettingsController::update');
});

// =====================================================
// Admin Routes (Admin & Pimpinan Only)
// =====================================================
$routes->group('admin', ['filter' => 'role:admin,pimpinan'], static function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Admin\DashboardController::index');

    // User Management
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('users/create', 'Admin\UserController::create');
    $routes->post('users', 'Admin\UserController::store');
    $routes->get('users/(:num)', 'Admin\UserController::show/$1');
    $routes->get('users/(:num)/edit', 'Admin\UserController::edit/$1');
    $routes->put('users/(:num)', 'Admin\UserController::update/$1');
    $routes->delete('users/(:num)', 'Admin\UserController::delete/$1');
    $routes->post('users/(:num)/toggle-status', 'Admin\UserController::toggleStatus/$1');

    // Asset Management
    $routes->get('assets', 'Admin\AssetController::index');
    $routes->get('assets/create', 'Admin\AssetController::create');
    $routes->post('assets', 'Admin\AssetController::store');
    $routes->get('assets/(:num)', 'Admin\AssetController::show/$1');
    $routes->get('assets/(:num)/edit', 'Admin\AssetController::edit/$1');
    $routes->put('assets/(:num)', 'Admin\AssetController::update/$1');
    $routes->delete('assets/(:num)', 'Admin\AssetController::delete/$1');
    $routes->get('assets/(:num)/assign', 'Admin\AssetController::assignForm/$1');
    $routes->post('assets/(:num)/assign', 'Admin\AssetController::assign/$1');
    $routes->post('assets/(:num)/unassign', 'Admin\AssetController::unassign/$1');
    $routes->get('assets/(:num)/history', 'Admin\AssetController::history/$1');

    // Ticket Management
    $routes->get('tickets', 'Admin\TicketController::index');
    $routes->get('tickets/(:num)', 'Admin\TicketController::show/$1');
    $routes->post('tickets/(:num)/assign', 'Admin\TicketController::assign/$1');
    $routes->post('tickets/(:num)/status', 'Admin\TicketController::updateStatus/$1');
    $routes->post('tickets/(:num)/response', 'Admin\TicketController::addResponse/$1');

    // Vehicle Management
    $routes->get('vehicles', 'Admin\VehicleController::index');
    $routes->get('vehicles/create', 'Admin\VehicleController::create');
    $routes->post('vehicles', 'Admin\VehicleController::store');
    $routes->get('vehicles/(:num)', 'Admin\VehicleController::show/$1');
    $routes->get('vehicles/(:num)/edit', 'Admin\VehicleController::edit/$1');
    $routes->put('vehicles/(:num)', 'Admin\VehicleController::update/$1');
    $routes->delete('vehicles/(:num)', 'Admin\VehicleController::delete/$1');

    // Vehicle Booking Management
    $routes->get('vehicle-bookings', 'Admin\VehicleBookingController::index');
    $routes->get('vehicle-bookings/(:num)', 'Admin\VehicleBookingController::show/$1');
    $routes->post('vehicle-bookings/(:num)/approve', 'Admin\VehicleBookingController::approve/$1');
    $routes->post('vehicle-bookings/(:num)/reject', 'Admin\VehicleBookingController::reject/$1');
    $routes->post('vehicle-bookings/(:num)/complete', 'Admin\VehicleBookingController::complete/$1');

    // Article Management (Knowledge Base)
    $routes->get('articles', 'Admin\ArticleController::index');
    $routes->get('articles/create', 'Admin\ArticleController::create');
    $routes->post('articles', 'Admin\ArticleController::store');
    $routes->get('articles/(:num)', 'Admin\ArticleController::show/$1');
    $routes->get('articles/(:num)/edit', 'Admin\ArticleController::edit/$1');
    $routes->put('articles/(:num)', 'Admin\ArticleController::update/$1');
    $routes->delete('articles/(:num)', 'Admin\ArticleController::delete/$1');
    $routes->post('articles/(:num)/publish', 'Admin\ArticleController::publish/$1');
    $routes->post('articles/(:num)/unpublish', 'Admin\ArticleController::unpublish/$1');

    // Reports
    $routes->get('reports/assets', 'Admin\ReportController::assets');
    $routes->get('reports/tickets', 'Admin\ReportController::tickets');
    $routes->get('reports/vehicles', 'Admin\ReportController::vehicles');
});

// =====================================================
// API Routes (for AJAX calls)
// =====================================================
$routes->group('api', ['filter' => 'auth'], static function ($routes) {
    // Assets
    $routes->get('assets/search', 'Api\AssetController::search');
    $routes->get('assets/user/(:num)', 'Api\AssetController::getByUser/$1');

    // Users
    $routes->get('users/search', 'Api\UserController::search');

    // Vehicles
    $routes->get('vehicles/available', 'Api\VehicleController::available');
    $routes->get('vehicles/check-availability', 'Api\VehicleController::checkAvailability');

    // Notifications
    $routes->get('notifications', 'Api\NotificationController::index');
    $routes->post('notifications/(:num)/read', 'Api\NotificationController::markAsRead/$1');
});
