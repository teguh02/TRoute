<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
use Teguh02\TRoute\Route;

/**
 * Define routes
 */
Route::get('/', function () {
    echo 'Hello World';
});

Route::get('/foo/bar', function () {
    echo 'foobar';
});

// /post_test/foo/bar/123
// will return post_test ["foo","bar","123"]
Route::post('/post_test/{params}', function ($params) {
    echo 'post_test ' . json_encode($params);
});

Route::put('/put_test', function () {
    echo 'put_test';
});

Route::patch('/patch_test', function () {
    echo 'patch_test';
});

// /delete_test/foo/bar/123
// will return delete_test ["foo","bar","123"]
Route::delete('/delete_test/{params}', function ($params) {
    echo 'delete_test ' . json_encode($params);
});

Route::any('/any_test', function () {
    echo 'any_test';
});

Route::match(['GET', 'POST'], '/match_test', function () {
    echo 'match_test';
});

// /foo/bar/123/teguh
// will return halo ['bar', '123', 'teguh']
Route::get('/foo/{params}', function ($params) {
    echo 'halo ' . json_encode($params); 
});

