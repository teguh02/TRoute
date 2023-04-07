<?php 

use Teguh02\TRoute\Route;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase {
    
    protected $routes;

    public function setUp(): void
    {
        $this->routes = Route::class;
    }

    public function testPostMethod()
    {
        $this->routes::post('/post_test', function () {
            echo 'Hello World';
        });

        $find = $this->routes::find("POST", '/post_test');

        $this->assertTrue($find);
    }

    public function testPostMethodWithParam()
    {
        $this->routes::post('/post_test/{params}', function ($params) {
            echo 'post_test ' . json_encode($params);
        });

        $find = $this->routes::find("POST", '/post_test/foo/bar/123');

        $this->assertTrue($find);
    }
    
}