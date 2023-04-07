<?php

namespace Teguh02\TRoute\Route;

trait MatchRoute
{
    public static function find($httpMethod, $uri)
    {
        // find route by method and uri
        return (bool) self::search($httpMethod, $uri);
    }

    public static function execute($httpMethod, $uri)
    {
        // find route by method and uri
        if ($search = self::search($httpMethod, $uri)) {
            if (is_callable($search['callback'])) {
                // check if route contain param
                if (isset($search['param'])) {
                    // explode param
                    $param = explode('/', $search['param']);

                    // remove empty value
                    $param = array_filter($param, function ($value) {
                        return $value !== '';
                    });
                    $param = array_values($param);

                    return call_user_func($search['callback'], $param);
                } else {
                    // if not contain param, then execute route
                    return call_user_func($search['callback']);
                }
            } else {
                // check if route is not callable
                return $search['callback'];
            }
            
        }
    }

    private static function search($httpMethod, $uri)
    {
        // loop all routes
        foreach (self::$routes as $route) {

            // check if route contain { } or not
            // and check if route match with uri
            if (
                strpos($route['url'], '{') !== false and 
                strpos($route['url'], '}') !== false and 
                strpos($uri, rtrim(strtok($route['url'], '{'), '/')) !== false
            ) {
                // get first { and last } position
                $first = strpos($route['url'], '{');
                $last = strpos($route['url'], '}');

                // get route param name
                $param = substr($route['url'], $first + 1, $last - $first - 1);

                // count route param value
                $paramValueCount = strlen($uri) - strlen($route['url']) + 2;

                // get route param value
                $paramValue = substr($uri, $first, $last - $first + $paramValueCount);
                // $paramValue = substr($paramValue, strpos($paramValue, '/'));

                // get route url without param
                $routeUrl = rtrim(substr($route['url'], 0, $first) . substr($route['url'], $last + 1), '/');

                // get uri without param value
                $uri = '/' . strtok($uri, '/');

                // save param value to array
                $route['param'] = $paramValue;
                $route['param_name'] = $param;

                // if route url match with uri
                // and if param value not empty
                if ($routeUrl == $uri and !empty($paramValue)) {
                    // if method match
                    if (in_array($httpMethod, $route['method'])) {
                        return $route;
                    } else {
                        return null;
                    }
                }
            } else {
                // if not contain { }, then check if route match with uri
                if ($route['url'] == $uri) {
                    // if match, then check if method match
                    if (in_array($httpMethod, $route['method'])) {
                        return $route;
                    } else {
                        return null;
                    }
                }
            }
        }
    }

    public static function all_routes():array
    {
        return self::$routes;
    }

    public static function current_request_url()
    {
        return strtok($_SERVER['REQUEST_URI'], '?');

        // // Strip query string (?foo=bar) and decode URI
        // if (false !== $pos = strpos($uri, '?')) {
        //     $uri = substr($uri, 0, $pos);
        // }
        // return rawurldecode($uri);
    }

    public static function current_request_method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}