<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Auth::user()->category;

        if ($category == 'student') {
            return redirect()->route('activity.login');
        }
        if ($category == 'lecturer') {
            return view('dashboard.Lecturer');
        }
        if ($category == 'committee') {
            return view('dashboard.Committee');
        }
        if ($category == 'coordinator') {
            return view('dashboard.Coordinator');
        }
        if ($category == 'hosd') {
            return view('dashboard.Hosd');
        }
        if ($category == 'dean') {
            return view('dashboard.Dean');
        }
    }
}
