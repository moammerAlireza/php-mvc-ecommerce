<?php

namespace App\controllers\admin;
use App\controllers\BaseController;
use App\classes\Session;

class DashboardController extends BaseController
{
    public function show()
    {
        session::add('admin', 'you are welcome, admin user');
        

        if (session::has('admin')) {
            $msg=session::get('admin');
        }else{
            $msg='not defined';
        }
        return view('admin/dashboard',['admin'=>$msg]);
    }
}