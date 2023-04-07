<?php

use Teguh02\TRoute\Route;
use PHPUnit\Framework\TestCase;

class GetTest extends TestCase
{
    protected $routes;

    public function setUp(): void
    {
        $this->routes = Route::class;
    }

    public function testGetMethod()
    {
        $this->routes::get('/', function () {
            echo 'Hello World';
        });

        $find = $this->routes::find("GET", '/');

        $this->assertTrue($find);
    }

    public function testGetMethodWithParam()
    {
        $this->routes::get('/foo/{params}', function ($params) {
            echo 'halo ' . json_encode($params); 
        });

        $find = $this->routes::find("GET", '/foo/bar/123/teguh');

        $this->assertTrue($find);
    }
}