<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Http\Requests\ActivityRequest;
use App\Models\ProposeActivity;

class ActivityController extends Controller
{
    public function index()
    { //main activity page
        return view('activity.activity');
    }

    // temporary

    public function activityProposed(){

        $activity = ProposeActivity::all();
        return view('activity.petakomcom.activity_list', compact('activity'));
    }

    public function show($id)
    { //details activity
        $activity = Activity::find($id);
        return view('activity.show_activity', compact('activity'));
    }
    // 
    public function showActivity()
    {

        $activity = Activity::all();
        return view(('activity.activity_login'), compact('activity'));
    }

    public function createActivity()
    {
        return view('activity.create_activity');
    }


    public function editActivity($id)
    {

        $activity = Activity::find($id);
        return view('activity.edit_activity', compact('activity'));
    }

    public function store(ActivityRequest $request)
    {

        Activity::create($request->all());

        return redirect()->route('activity.login')->with('success', 'Successfully added');
    }

    public function update(ActivityRequest $request, $id)
    {

        $activity = Activity::find($id);
        $activity->update($request->all());

        return redirect()->route('activity.login')->with('success', 'Successfully updated');
    }

    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        $activity->propose->delete();

        return back()->with('success', 'Successfully deleted');
    }

    public function proposeActivity($id)
    {
        $activity = Activity::find($id);
        $propose = new ProposeActivity();
        $pactivity = $activity->id;
        $check = ProposeActivity::where([
            ['activity_id', '=', $pactivity]
        ])->first();

        if($check){
            return back()->with('error', 'Already proposed');
        }

        $propose->activity_id = $activity->id;
        $propose->save();

        return back()->with('success', 'Successfully proposed');
    }

    public function approveActivity($id){

        $activity = Activity::find($id);

        $activity->status = "Approved";
        $activity->save();
        
        return back()->with('success', 'Successfully approved');
    }

    public function rejectActivity($id){

        $activity = Activity::find($id);

        $activity->status = "Rejected";
        $activity->save();

        return back()->with('success', 'Successfully rejected');
    }

    public function showProposedActivity(){

        $propose = ProposeActivity::all();
        return view('activity.propose_activity', compact('propose'));
    }
}
