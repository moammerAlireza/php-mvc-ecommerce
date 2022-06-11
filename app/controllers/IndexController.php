<?php

namespace App\controllers;
use App\classes\mail;


class IndexController extends BaseController
{

    public function show()
    {
        echo  "Inside homepage from controller class";

        $mail= new mail();
        
        $data=[
            'to'=>'moameralireza@gmail.com',
            'subject'=>'welcom to ACME sore',
            'view'=>'welcome',
            'name'=>'john doe',
            'body'=>"testing email template"
        ];

        if($mail->send($data)){
            echo "email send successfully";
        }else{
            echo "email sending failed";
        }
    }
}