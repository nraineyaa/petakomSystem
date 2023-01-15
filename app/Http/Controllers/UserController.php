<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    { //register election (CREATE)
        return view('register.myProfile');
    }

    public function userList()
    { //
        return view('register.userList');
    }
}
