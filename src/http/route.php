<?php

namespace Sectheater\http;

use Sectheater\view\view;

class route {

    public $request;

    public $response;

    public function __construct($request,$response) {

        $this->request = $request;

        $this->response = $response;
    }

    public static array $route = [];

    public static function get($route, $action) {

        self::$route['get'][$route] = $action;
    }

    public static function post($route, $action) {

        self::$route['post'][$route] = $action;
    }

    public function resolve() {

        $path   = $this->request->path();

        $method = $this->request->method(); // path -> method
        
        $action = self::$route[$method][$path] ?? false;

        var_dump($action);

        if (!array_key_exists($path, self::$route[$method])) {
            
            view::makeError('404');
        }

        if (is_callable($action)) {
            
            call_user_func_array($action, []);
        }

        if (is_array($action)) {
            
            $controller = new $action[0];
        
        }
    }
}

?>