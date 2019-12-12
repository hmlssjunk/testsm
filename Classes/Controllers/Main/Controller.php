<?php

namespace Controllers\Main;

use Views\View;

class Controller
{
    public function primary()
    {
        $view = new View();
        $html = $view->render('tpl/main.tpl');
        echo $html;
    }
}
