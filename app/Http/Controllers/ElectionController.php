<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Election;

class ElectionController extends Controller
{
    public function vote(){ //List for vote
        return view('election.student.studList');
    }
    public function register(){ //register election
        return view('election.student.register');
    }
    public function comList(){ // List for Committee
        return view('election.committee.comList');
    }
    public function comInfo(){ //Info for Committee
        return view('election.committee.comInfo');
    }
    public function hosdList(){ // List for Committee
        return view('election.hosd.hosdList');
    }
    public function hosdInfo(){ //Info for Committee
        return view('election.hosd.hosdInfo');
    }
}
