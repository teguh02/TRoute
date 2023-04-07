# TRoute
Simple and Fast PHP Routing System

# Installation
To install with composer you can run this command to your already project

```
composer
```

# Usage
If you install it to create a new PHP framework, you must create a new route file, for example you create a route file with name of file is ```web.php``` in your routes folder, and then here a basic of routes

```php
// web.php

<?php
use Teguh02\TRoute\Route;

Route::get('/', function () {
    echo 'Hello World';
});

Route::get('/foo/bar', function () {
    echo 'foobar';
});

```
and then you must call this code inside your main framework system to match the route according your current request method and url.

```php
// your main framework system
<?php

require 'web.php';
use Teguh02\TRoute\Route;

//...other code

public function match_route() {
    $httpMethod = Route::current_request_method();
    $uri = Route::current_request_url();

    $findRoute = Route::find($httpMethod, $uri); // true if route found or false if not found

    if ($findRoute) {
        // execute when route are match
        return Route::execute($httpMethod, $uri);
    } else {
        // show 404 message when route doesn't match
        echo '404 Route not found';
    }

    //...other code
}

```

# Sample

## Full of routes file

```php
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


```

and you can see all of sample files inside <a href="https://github.com/teguh02/TRoute/example">example folder</a>

if you have a question feel free to open a new issue, or if you want to collaborate this project you can clone and open a pull request to my repository. 

Thanks