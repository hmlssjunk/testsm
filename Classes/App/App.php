<?php

namespace App;

use App\Router;

class App
{
    public function __construct()
    {
        $router = new Router($_SERVER['REQUEST_URI']);
        $router->run();
    }

}
