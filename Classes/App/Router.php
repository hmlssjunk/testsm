<?php

namespace App;

class Router
{
    private $controller;
    private $method;

    
    public function __construct(string $url)
    {
        echo $url;
    
    }

    public function run()
    {
        echo 'Hello world';

    
    }


}
