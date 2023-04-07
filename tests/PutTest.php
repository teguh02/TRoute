<?php 

use Teguh02\TRoute\Route;
use PHPUnit\Framework\TestCase;

class PutTest extends TestCase {
    
    protected $routes;

    public function setUp(): void
    {
        $this->routes = Route::class;
    }

    public function testPutMethod()
    {
        $this->routes::put('/put_test', function () {
            echo 'Hello World';
        });

        $find = $this->routes::find("PUT", '/put_test');

        $this->assertTrue($find);
    }

    public function testPutMethodWithParam()
    {
        $this->routes::put('/put_test/{params}', function ($params) {
            echo 'put_test ' . json_encode($params);
        });

        $find = $this->routes::find("PUT", '/put_test/foo/bar/123');

        $this->assertTrue($find);
    }
}