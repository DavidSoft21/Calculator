<?php

namespace App\Support\Utils\Routes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/** 
 * @author DavidSoft21
 * @date 2024-02-19
 * @email emer.riascos@correounivalle.edu.co
 * 
 */



/**
 * The Route class is responsible for managing application routes.
 *
 * Allows you to register routes associated with the HTTP GET, POST, PUT and DELETE methods.
 * Each route is associated with a callback that is executed when the route is accessed.
 * The class also provides a method to dispatch the current HTTP request to the corresponding route and method.
 *
 */
class Route
{
    /**
     * Stores all routes registered in the application.
     *
     * It is an associative array where the keys are the HTTP methods and the values ​​are associative arrays of routes and callbacks.
     * For example: ['GET' => ['path' => callback, ...], 'POST' => ['path' => callback, ...], ...]
     *
     * @var array
     */
    private static $routes = [];

    /**
     * Register a new GET route in the application.
     *
     * @param string $uri The URI of the path, without the leading slash.
     * @param callable $callback The function to execute when the path is accessed.
     * @return void
     */
    public static function get($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['GET'][$uri] = $callback;
    }


    /**
     * Register a new POST route in the application.
     *
     * @param string $uri The URI of the path, without the leading slash.
     * @param callable $callback The function to execute when the path is accessed.
     * @return void
     */
    public static function post($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['POST'][$uri] = $callback;
    }

    /**
     * Register a new PUT route in the app.
     *
     * @param string $uri The URI of the path, without the leading slash.
     * @param callable $callback The function to execute when the path is accessed.
     * @return void
     */
    public static function put($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['PUT'][$uri] = $callback;
    }



    /**
     * Register a new DELETE route in the application.
     *
     * @param string $uri The URI of the path, without the leading slash.
     * @param callable $callback The function to execute when the path is accessed.
     * @return void
     */
    public static function delete($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['DELETE'][$uri] = $callback;
    }



    /**
     *
     * Handles and dispatches the current HTTP request to the corresponding route and method.
     *
     * This function loops through all routes registered for the current request's method.
     * If it finds a route that matches the request URI, it executes the callback associated with that route.
     * If the callback returns an array or an object, it is converted to JSON and sent with the 'Content-Type: application/json' header.
     * If no route is found that matches the request URI, a 404 HTTP response code is sent.
     *
     * @return void
     */
    public static function dispatch()
    {
        $uri =  $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route => $callback) {

            if (strpos($route, ':') !== false) {
                $route = preg_replace('#:([a-zA-Z0-9]+)#', '([a-zA-Z0-9]+)', $route);
            }

            if (preg_match("#^$route$#", $uri, $matches)) {

                $params = array_slice($matches, 1);


                //Function that is executed when we only have one function in the route
                if (is_callable($callback)) {
                    $response = $method == 'POST' || $method == 'DELETE' || $method == 'PUT'
                        ? call_user_func_array($callback, [$_POST])
                        : call_user_func_array($callback, [$params]);
                }


                //Function that is executed when we have a controller and a method in the route
                if (is_array($callback)) {
                    $controller = new $callback[0];


                    $response = $method == 'POST' || $method == 'DELETE' || $method == 'PUT'
                        ? call_user_func_array([$controller, $callback[1]], [$_POST, $params])
                        : call_user_func_array([$controller, $callback[1]], [$params]);
                }

                if (isset($response)) {
                    if (is_array($response) || is_object($response)) {
                        header('Content-Type: application/json');
                        echo json_encode($response);
                        return;
                    }
                    echo $response;
                    return;
                }
            }
        }

        header('location: /');
    }
}
