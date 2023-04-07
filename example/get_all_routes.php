<?php

require 'web.php';
use Teguh02\TRoute\Route;

// Get all routes as array
$routes = Route::all_routes();

echo '<pre>';
print_r($routes);
echo '</pre>';