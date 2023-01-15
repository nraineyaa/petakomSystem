<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportModel;

class ReportController extends Controller
{
    public function indexReportCreator()
    { //main report page for student, lecturer, committee
        $reports = ReportModel::orderBy('created_at')->get();
        return view('report.ReportCreatorPage')->with('reports', $reports);
    }
    public function indexReportHOSDCoordinator()
    { //main report page for student, lecturer, committee
        $reports = ReportModel::orderBy('created_at')->get();
        return view('report.ReportHOSDCoordinator')->with('reports', $reports);
    }
    public function indexReportDean()
    { //main report page for student, lecturer, committee
        $reports = ReportModel::orderBy('created_at')->get();
        return view('report.ReportDean')->with('reports', $reports);
    }


    public function storeReport(Request $request)
    {
        $Report = new ReportModel();
        $Report->report_title = $request->input('report_title');
        $Report->report_date = $request->input('report_date');
        $Report->report_objectives = $request->input('report_objectives');
        $Report->report_description = $request->input('report_description');

        $Report->save();

        return redirect('/ReportCreator')->with('flash_message', 'Report Created!'); 
    }

    public function approveReportbyHOSD($id){

        $reports = Report::find($id);

        $reports->HOSDApproval = "Approved";
        $activity->save();
        
        return back()->with('success', 'Successfully approved');
    }
    public function approveReportCoordinator($id){

        $reports = Report::find($id);

        $reports->CoordinatorApproval = "Approved";
        $activity->save();
        
        return back()->with('success', 'Successfully approved');
    }
    public function approveReportDean($id){

        $reports = Report::find($id);

        $reports->DeanApproval = "Approved";
        $activity->save();
        
        return back()->with('success', 'Successfully approved');
    }
}
