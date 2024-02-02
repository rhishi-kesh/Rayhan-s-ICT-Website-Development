<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersControllser extends Controller
{
    public function users(){
        $users = User::paginate();
        return view('backend/pages/users/users', compact('users'));
    }
    public function usersDelete($id){

    }
}
