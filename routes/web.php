<?php

use SecTheater\http\route;
use App\controlers\Auth\RegisterController;
use App\controlers\homecontroller;
use App\controlers\ContactController;

route::get('/', [homecontroller::class, 'index']);
route::get('/home', [homecontroller::class, 'index']);

route::get('/contact', [ContactController::class, 'index']);
route::post('/', [ContactController::class, 'store']);

route::get('/signup', [RegisterController::class, 'index']);
route::post('/signup', [RegisterController::class, 'store']);


?>