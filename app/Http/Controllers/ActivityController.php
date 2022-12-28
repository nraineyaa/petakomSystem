<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){ //main activity page
        return view('activity.activity');
    }

    public function show(){ //details activity
        return view('activity.show_activity');
    }

    public function showActivity(){
        return view(('activity.activity_login'));
    }

    public function createActivity(){
        return view('activity.create_activity');
    }

    public function editActivity(){
        return view('activity.edit_activity');
    }
}
