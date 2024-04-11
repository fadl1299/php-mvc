<?php

namespace Sectheater\http;

class request {

    public function getmethod() {

        return $_SERVER['REQUEST_METHOD'];
    }

    public function path() {

        $path = $_SERVER['REQUEST_URL'] ?? '/';

        return str_contains($path, "?") ? explode("?", $path)[0] :$path ;
    }
}

?>