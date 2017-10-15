<?php

require_once '../vendor/autoload.php';

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

// Routes
$router->post('/convert/fromIps', ['\Controller\Convert', 'fromIps']);
$router->post('/convert/fromLongs', ['\Controller\Convert', 'fromLongs']);

// Setup a dispatcher
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
try {
    // Try and dispatch the request and catch exceptions from PHRoute
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch (\Controller\BadRequestException $e) {
    http_response_code(400);
    error_log($e->getMessage());
    $response = $e->getMessage();
} catch (Phroute\Phroute\Exception\HttpRouteNotFoundException $e) {
    // No route handler found for the requested URI, so return a 404 HTTP code and render the 404 page
    http_response_code(404);
    error_log($e->getMessage());
    $response = 'The requested resource was not found';
} catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $e) {
    // No route handler for the requested HTTP method, so return a 405 HTTP code and render the 405 page
    http_response_code(405);
    error_log($e->getMessage());
    $response = 'The requested method is not available on the requested resource';
} catch (Exception $e) {
    // This serves as a catch-all exception handler so that we can return a styled response to users if a server error occurs.
    http_response_code(500);
    error_log($e->getMessage());
    $response = 'Sorry, but an error occurred whilst processing your request';
}

// Print out the value returned from the dispatched function
print $response . PHP_EOL;
