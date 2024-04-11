<?php

use SecTheater\Application;
use Sectheater\view\view;

if (! function_exists('env')) {
    

    function env($key, $default = null) {

        return $_ENV[$key] ?? value($default);
    }
}

if (! function_exists('app')) {
    
    function app() {
        
        static $instance = null;

        if (! $instance) {
            
            $instance = new Application;
        }
    }
}

if (!function_exists('value')) {
    function value($value){
        return ($value instanceof Closure) ? $value() : $value ;
    }
}

if (! function_exists('base_path')) {
    
    function base_path($path = '') {

        return dirname(__DIR__) . '/../' . $path;
    
    }

    if (!function_exists('config')) {
        function config($key = null, $default = null)
        {
            if (is_null($key)) {
                // return app()->config;
                return 'App Config Null';
            }
    
            if (is_array($key)) {
                // return app()->config->set($key);
                return 'App Config Array';
            }
    
            // return app()->config->get($key, $default);
        }
    }

    if (! function_exists('config_path')) {
        
        function config_path() {

            return base_path() . ''; 
        }
    }


    if (! function_exists('view_path')) {
    
        function view_path() {
    
            return base_path() . 'view/';
        
        }
}

}

if (!function_exists('view')) {
    
    function view($view, $params = []) {

        view::make($view, $params);
    }
}

?>