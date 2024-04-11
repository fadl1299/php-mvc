<?php

use Sectheater\http\route;

use App\controlers\homecontroller;

route::get('', [homecontroller::class, 'index']);

?>