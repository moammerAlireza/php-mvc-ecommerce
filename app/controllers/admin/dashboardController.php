<?php

namespace App\controllers\admin;
use App\controllers\BaseController;
use App\classes\Session;
use App\classes\Request;

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


    public function get()
    {
        Request::refresh();
        $data = Request::old('post', 'product');
        var_dump($data);
        /*if(Request::has('post')){
            $request=Request::get('post');
            var_dump($request->product);
        }else{
            var_dump('posting doesnt exist');
        }*/
       
       
    }
}