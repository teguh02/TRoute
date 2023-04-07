<?php

namespace Teguh02\TRoute\Route;

trait Route {

    private static $routes = [];

    public static function get(String $url, $callback = [], Array $options = [])
    {
        // save all route info to array
        array_push(self::$routes, [
            'url' => $url,
            'callback' => $callback,
            'options' => $options,
            'method' => ['GET']
        ]);
    }

    public static function post(String $url, $callback = [], Array $options = [])
    {
        // save all route info to array
        array_push(self::$routes, [
            'url' => $url,
            'callback' => $callback,
            'options' => $options,
            'method' => ['POST']
        ]);
    }

    public static function put(String $url, $callback = [], Array $options = [])
    {
        // save all route info to array
        array_push(self::$routes, [
            'url' => $url,
            'callback' => $callback,
            'options' => $options,
            'method' => ['PUT']
        ]);
    }

    public static function patch(String $url, $callback = [], Array $options = [])
    {
        // save all route info to array
        array_push(self::$routes, [
            'url' => $url,
            'callback' => $callback,
            'options' => $options,
            'method' => ['PATCH']
        ]);
    }

    public static function delete(String $url, $callback = [], Array $options = [])
    {
        // save all route info to array
        array_push(self::$routes, [
            'url' => $url,
            'callback' => $callback,
            'options' => $options,
            'method' => ['DELETE']
        ]);
    }

    public static function any(String $url, $callback = [], Array $options = [])
    {
        // save all route info to array
        array_push(self::$routes, [
            'url' => $url,
            'callback' => $callback,
            'options' => $options,
            'method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE']
        ]);
    }

    public static function match(Array $method, String $url, $callback = [], Array $options = [])
    {
        // save all route info to array
        array_push(self::$routes, [
            'url' => $url,
            'callback' => $callback,
            'options' => $options,
            'method' => $method
        ]);
    }

}