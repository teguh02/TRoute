<?php

use Teguh02\TRoute\Route;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase {

    protected $routes;

    public function setUp(): void
    {
        $this->routes = Route::class;
    }

    public function testRouteAsArray()
    {
        $this->routes::get('/', function () {
            echo 'Hello World';
        });

        $this->routes::get('/foo/bar', function () {
            echo 'foobar';
        });

        $this->routes::post('/post_test/{params}', function ($params) {
            echo 'post_test ' . json_encode($params);
        });

        $this->routes::put('/put_test', function () {
            echo 'put_test';
        });

        $route_as_array = $this->routes::all_routes();

        $this->assertIsArray($route_as_array);
    }

    public function testGetRequestMethod()
    {
        // set request method to GET
        $_SERVER['REQUEST_METHOD'] = 'GET';

        // get current request method
        $method = $this->routes::current_request_method();

        $this->assertEquals('GET', $method);
    }
    
    public function testPostRequestMethod()
    {
        // set request method to POST
        $_SERVER['REQUEST_METHOD'] = 'POST';

        // get current request method
        $method = $this->routes::current_request_method();

        $this->assertEquals('POST', $method);
    }

    public function testPutRequestMethod()
    {
        // set request method to PUT
        $_SERVER['REQUEST_METHOD'] = 'PUT';

        // get current request method
        $method = $this->routes::current_request_method();

        $this->assertEquals('PUT', $method);
    }

    public function testPatchRequestMethod()
    {
        // set request method to PATCH
        $_SERVER['REQUEST_METHOD'] = 'PATCH';

        // get current request method
        $method = $this->routes::current_request_method();

        $this->assertEquals('PATCH', $method);
    }

    public function testDeleteRequestMethod()
    {
        // set request method to DELETE
        $_SERVER['REQUEST_METHOD'] = 'DELETE';

        // get current request method
        $method = $this->routes::current_request_method();

        $this->assertEquals('DELETE', $method);
    }

    public function testAnyRequestMethod()
    {
        $method = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'];
        $pick_one = $method[array_rand($method)];

        // set request method to ANY
        $_SERVER['REQUEST_METHOD'] = $pick_one;

        // get current request method
        $method = $this->routes::current_request_method();

        $this->assertEquals($pick_one, $method);
    }

    public function testMatchRequestMethod()
    {
        $method = ['GET', 'POST'];
        $pick_one = $method[array_rand($method)];

        // set request method to ANY
        $_SERVER['REQUEST_METHOD'] = $pick_one;

        // get current request method
        $method = $this->routes::current_request_method();

        $this->assertEquals($pick_one, $method);
    }
}