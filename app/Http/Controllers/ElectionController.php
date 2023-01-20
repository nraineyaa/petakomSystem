<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Election;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

class ElectionController extends Controller
{
    //VOTE LIST 
    public function vote(Election $election)
    {

        $election = DB::table('election')
            ->orderBy('id', 'desc')
            ->where('status', 'Pending')
            ->get();


        return view('election.student.studList', compact('election'));
    }
    public function register()
    { //register election (CREATE)
        $id = Auth::user()->id;
        $election = DB::table('election')
            ->where('user_id', $id)
            ->exists();

        $election_data = DB::table('election')
        ->where('user_id', $id)
        ->get();


        return view('election.student.register', compact('election', 'election_data'));
    }

    public function updateReg(Request $request, $id)
    {
        $election = Election::find($id);
        
        return view('election.student.updateReg', compact('election')); //List for vote (UPDATE & DELETE)
    }
    public function comList()
    { // List for Committee
        return view('election.committee.comList');
    }
    public function comInfo()
    { //Info for Committee
        return view('election.committee.comInfo');
    }
    public function hosdList()
    { // List for Committee
        $election = DB::table('election')
            ->orderBy('id', 'desc')
            ->where('status', 'Pending')
            ->get();


        return view('election.hosd.hosdList', compact('election'));
    }
    
    //HOSD INFO
    public function hosdInfo()
    { 
        $election = DB::table('election')
            ->orderBy('id', 'desc')
            ->get();


        return view('election.hosd.hosdInfo', compact('election'));
    }


    //STORE REGISTRATION (STUDENT)
    public function store(Request $request)
    {

        $id = Auth::user()->id;
        $profile_img = $request->file('profile_img');
        $student_ID = $request->input('student_ID');
        $full_name = $request->input('full_name');
        $crt_semester = $request->input('crt_semester');
        $crt_result = $request->input('crt_result');
        $prv_activities = $request->input('prv_activities');
        $manifesto = $request->input('manifesto');
        $status = 'Pending';


        $filename = time() . '.' . $profile_img->getClientOriginalExtension();
        $request->profile_img->move('assets', $filename);

        $data = array(
            'user_id' => $id,
            'profile_img' => $filename,
            'student_ID' => $student_ID,
            'full_name' => $full_name,
            'crt_semester' => $crt_semester,
            'crt_result' => $crt_result,
            'prv_activities' => $prv_activities,
            'manifesto' => $manifesto,
            'status' => $status,
        );

        DB::table('election')->insert($data);

        return redirect()->route('election.student.register');
    }

    public function show(Election $election)
    {
        $election = DB::table('election')
            ->orderBy('id', 'asc')
            ->get();

        return view('election.student.updateReg', compact('election'));
    }

    //UPDATE REGISTRATION DETAILS (STUDENT)
    public function update(Request $request, $id)
    {
        $election = Election::find($id);
        $path = public_path() . '/assets/' . $election->profile_img;
        if (file_exists($path)) {
            unlink($path);
        }

        $election->profile_img = $request->file('profile_img');
        $election->student_ID = $request->input('student_ID');
        $election->full_name = $request->input('full_name');
        $election->crt_semester = $request->input('crt_semester');
        $election->crt_result = $request->input('crt_result');
        $election->prv_activities = $request->input('prv_activities');
        $election->manifesto = $request->input('manifesto');

        $filename = time() . '.' . $election->profile_img->getClientOriginalExtension();
        $request->profile_img->move('assets', $filename);

        $election->profile_img = $filename;
        $election->update();

        return redirect()->route('election.student.register') //go to dashboard
            ->with('Success', 'Election registration has been updated');
    }

    //CANCEL REGISTRATION (STUDENT)
    public function destroy(Request $request, $id) 
    {
        $election = Election::find($id);
        $path = public_path() . '/assets/' . $election->profile_img;
        if (file_exists($path)) {
            unlink($path);
        }

        DB::delete('DELETE FROM election WHERE id = ?', [$id]);
        echo "Deleted Successfully";

        return redirect()->back()->with('message','Deleted');
    }

    //REGISTRATION APPROVAL (HOSD)
    public function approval($id)
    {
        $election = Election::find($id);
        $election->status = "Approved";

        $election->update();
        return redirect()->route('election.hosd.hosdList');
    }

    public function reject($id)
    {
        $election = Election::find($id);
        $election->status = "Rejected";

        $election->update();
        return redirect()->route('election.hosd.hosdList');
    }
}
