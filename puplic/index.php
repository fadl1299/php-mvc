<?php

session_start();
use Dotenv\Dotenv;
use SecTheater\support\Arr;

require_once __DIR__ . '/../src/Support/helpers.php';
require_once base_path() . 'vendor/autoload.php';
require_once base_path() . 'routes/web.php';

// $env = Dotenv::createImmutable(base_path());

// $env->load();

// app()->run();

// var_dump();
?>