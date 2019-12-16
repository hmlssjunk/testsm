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

    public function sendMessage()
    {
        $json = json_decode(file_get_contents('php://input'));
        $message = new Message();
        $result = $message->send($json->name, $json->mail, $json->message)? 'complete': 'error';
        $resultjson['status'] = $result; 
        die(json_encode($resultjson));
    }

    public function getMessage()
    {
        $messages = new Message();
        $param = $messages->get();
        $paramjson = json_encode($param);
        die($paramjson);
    }
}
