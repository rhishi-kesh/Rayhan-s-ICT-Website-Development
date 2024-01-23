<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DashboardController extends Controller
{
    public function dashboard(){

        // $data = array();
        // if(Session::has('loginId'))

        return view('backend/pages/main');
    }
}
