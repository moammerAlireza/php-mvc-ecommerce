<?php

namespace App\controllers\admin;
use App\controllers\BaseController;

class DashboardController extends BaseController
{
    public function show()
    {
        return view('admin/dashboard');
    }
}