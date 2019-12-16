<?php

namespace Controllers\Main;

use Views\View;
use Models\Message;
use JsonSchema\Validator;

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
        $schema = (object) [
                        "type"=>"object",
                        "properties"=>(object)[
                        "name"=>(object)[
                            "type"=>"string",
                            "minLength"=>4,
                            "maxLength"=>30
                        ],
                        "mail"=>(object)[
                            "type"=>"string",
                            "minLength"=>10,
                            "maxLength"=>50
                        ],
                        "message"=>(object)[
                            "type"=>"string",
                            "minLength"=>10,
                            "maxLength"=>2000
                        ]
                        ]
        ];

        $validator = new Validator();
        $validator->validate($json, $schema);

        if ($validator->isValid()) {
            $message = new Message();
            $result = $message->send($json->name, $json->mail, $json->message)? 'ok': 'error';
            $resultjson['status'] = $result; 
            die(json_encode($resultjson));
        } else {
            echo "JSON does not validate. Violations:\n";
            foreach ($validator->getErrors() as $error) {
            echo sprintf("[%s] %s\n",$error['property'], $error['message']);
            }
        }
}

    public function getMessage()
    {
        $messages = new Message();
        $param = $messages->get();
        $paramjson = json_encode($param);
        die($paramjson);
    }
}
