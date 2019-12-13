<?php

namespace Controllers\Main;

use Views\View;
use Models\Message;
class Controller
{
    public function primary()
    {
        $messages = new Message();
        $param = $messages->get();
        $view = new View();
        $html = $view->render('tpl/main.tpl', $param);
        echo $html;
    }
}
