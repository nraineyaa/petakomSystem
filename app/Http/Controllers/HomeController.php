<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulletinModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('dashboard.Student');
    // }

    //bulletin show title
    public function homepage()
    {
        $bulletin = BulletinModel::orderBy('created_at','desc')->paginate(5);
        return view('homepage')->with('bulletin', $bulletin);
    }

     public function index()
    {
         return view('dashboard.Student');
 }
}
