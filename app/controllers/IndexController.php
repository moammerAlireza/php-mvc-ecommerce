<?php

namespace App\controllers;



class IndexController extends BaseController
{

    public function show()
    {
        return view('home');
    }
}