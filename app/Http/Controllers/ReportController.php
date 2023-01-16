<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportModel;
use App\Models\ProposeReport;

class ReportController extends Controller
{
    //To view the page for HOSD
    public function ReportProposedHOSD()
    {
        $report = ProposeReport::all();
        return view('report.report_listHOSD', compact('report'));

    }
    //To view page for Coordinator
    public function ReportProposedCoordinator()
    { 
        $report = ProposeReport::all();
        return view('report.report_listCoordinator', compact('report'));
    }
    //To view page for Dean
    public function ReportProposedDean()
    { 
        $report = ProposeReport::all();
        return view('report.report_listDean', compact('report'));
    }

    public function show($id)
    {
        //view details of the report
        $report = Report::find($id);
        return view('report.show_report', compact('report'));
    }

    public function showReport()
    {
        $report = Report::all();
        return view(('report.report_view'), compact('report'));
    }


    public function createReport()
    {
         return view('report.create_report');
    }

    public function editReport($id)
    {
        $report = Report::find($id);
        return view('report.edit_report', compact('report'));

    }
    public function store(ReportRequest $request)
    {
        Report::create($request->all());
        return redirect()->route('report.view')->with('success', 'Successfully added');
    }
    public function update(ReportRequest $request, $id)
    {
        $report = Report::find($id);
        $reportSubmit = SubmitReport::where('report_id', '=', $report->id);
        $reportSubmit->delete();

        $report->update($request->all());
        $report->statusapprovalbyHOSD = "";
        $report->statusapprovalbyCoordinator = "";
        $report->statusapprovalbyDean = "";

        return redirect()->route('report.view')->with('success', 'Successfully updated');
    }

    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();
        $report->submit->delete();

        return back ()->with('success', 'Successfully deleted');
    }

    public function approveReportHOSD($id)
    {
        $report = Report::find($id);
        $report->statusbyHOSD = "Approved";
        $report->save();

        return back()->with('success', 'Successfully approved');
    }

    public function RejectReportHOSD($id)
    {
        $report = Report::find($id);
        $report->statusbyHOSD = "Rejected";
        $report->save();

        return back()->with('success', 'Successfully rejected');
    }


    public function approveReportCoordinator($id)
    {
        $report = Report::find($id);
        $report->statusbyCoordinator = "Approved";
        $report->save();

        return back()->with('success', 'Successfully approved');
    }

    public function RejectReportCoordinator($id)
    {
        $report = Report::find($id);
        $report->statusbyCoordinator = "Rejected";
        $report->save();

        return back()->with('success', 'Successfully rejected');
    }

    public function confirmReportDean($id)
    {
        $report = Report::find($id);
        $report->statusbyDean = "Confirm";
        $report->save();

        return back()->with('success', 'Successfully confirm');
    }

    public function DenyReportCoordinator($id)
    {
        $report = Report::find($id);
        $report->statusbyDean = "Confirm";
        $report->save();

        return back()->with('success', 'Successfully deny');
    }
}
