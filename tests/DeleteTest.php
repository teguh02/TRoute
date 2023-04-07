<?php

use Teguh02\TRoute\Route;
use PHPUnit\Framework\TestCase;

class DeleteTest extends TestCase
{
    protected $routes;

    public function setUp(): void
    {
        $this->routes = Route::class;
    }

    public function testDeleteMethod()
    {
        $this->routes::delete('/delete_test', function () {
            echo 'Hello World';
        });

        $find = $this->routes::find("DELETE", '/delete_test');

        $this->assertTrue($find);
    }

    public function testDeleteMethodWithParam()
    {
        $this->routes::delete('/delete_test/{params}', function ($params) {
            echo 'delete_test ' . json_encode($params);
        });

        $find = $this->routes::find("DELETE", '/delete_test/foo/bar/123');

        $this->assertTrue($find);
    }

}