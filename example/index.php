<?php

require 'web.php';
use Teguh02\TRoute\Route;

$httpMethod = Route::current_request_method();
$uri = Route::current_request_url();

$findRoute = Route::find($httpMethod, $uri); // true if route found or false if not found

if ($findRoute) {
    return Route::execute($httpMethod, $uri);
} else {
    echo '404 Route not found';
}
