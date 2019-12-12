<?php

namespace App;

use Views\View;

class Router
{
    private $controller;
    private $method;

    public function __construct(string $url)
    {
        $this->controller = '\\Controllers\\Main\\Controller';
        $this->method = 'primary';

        $arr = explode('/', $url);
        
        if (($arr[1]!=null)) {
            $this->controller = '\\Controllers\\'.$arr[1].'\\Controller';
        }

        if (isset($arr[2]) && $arr[2]) {
            $this->method = $arr[2];
        }
    }

    public function run(){
        $this->check();
        $controller = new $this->controller();
        $method = $this->method;
        $controller->$method();    
    }

    public function check()
    {
        if (!class_exists($this->controller)){
            $this->show404('no controller '.$this->controller);
        }
        if(!method_exists($this->controller, $this->method)){
            $this->show404('no method '.$this->method);
        }
    }

    public function show404($error)
    {
        http_response_code(404);
        $view = new View();
        $html = $view->render('tpl/404.tpl');
        echo $html;
        exit();
    }    
}

