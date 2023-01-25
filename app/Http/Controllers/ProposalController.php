<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProposalModel;
use App\Models\ProposeProposal;


class ProposalController extends Controller
{      
    public function HOSDProposalProposed()
    {
        $proposal = ProposeProposal::all();
        return view('proposal.proposal_listHOSD', compact('proposal'));
    }

    public function CoordinatorProposalProposed()
    {
        $proposal = ProposeProposal::all();
        return view('proposal.proposal_listCorodinator', compact('proposal'));
    }

    public function DeanProposalProposed()
    {
        $proposal = ProposeProposal::all();
        return view('proposal.proposal_listDean', compact('proposal'));
    }

    public function store(ProposalRequest $request)
    {
        Proposal::create($request->all());
        //check balik

        return redirect()->route('proposal.view')->with('success', 'Successfully added');
    }

    public function showProposal()
    {
        //proposal view
        $proposal = ProposalModel::all();
        return view('proposal.proposal_view', compact('proposal'));
    }

    public function show($id)
    {
        //proposal view
        $proposal = Proposal::find($id);
        return view('proposal.show_proposal', compact('proposal'));
    }

    public function createProposal($id)
    {
        return view('proposal.create_proposal');
    }

    public function editProposal($id)
    {
        $proposal = Proposal::find($id);
        return view('proposal.edit_proposal', compact('proposal'));
    }

    public function destroy($id)
    {
        $proposal = Proposal::find($id);
        $proposal->delete();

        return back()->with('success', 'Successfully deleted');
    }

    public function HOSDapproveProposal($id){

        $proposal = Proposal::find($id);

        $proposal->statusbyHOSD = "Approved";
        $proposal->save();
        
        return back()->with('success', 'Successfully approved');
    }

    public function HOSDrejectProposal($id){

        $proposal = Proposal::find($id);
       
        $proposal->statusbyHOSD = "Rejected";
        $proposal->save();


        return back()->with('success', 'Successfully rejected');
    }

    public function CoordinatorapproveProposal($id){

        $proposal = Proposal::find($id);

        $proposal->statusbyCoordinator = "Approved";
        $proposal->save();
        
        return back()->with('success', 'Successfully approved');
    }

    public function CoordinatorrejectProposal($id){

        $proposal = Proposal::find($id);
       
        $proposal->statusbyCoordinator = "Rejected";
        $proposal->save();


        return back()->with('success', 'Successfully rejected');
    }

    public function DeanconfirmProposal($id){

        $proposal = Proposal::find($id);

        $proposal->statusbyDean = "Confirm";
        $proposal->save();
        
        return back()->with('success', 'Successfully Confirm');
    }

    public function DeandenyProposal($id){

        $proposal = Proposal::find($id);
       
        $proposal->statusbyDean = "Deny";
        $proposal->save();


        return back()->with('success', 'Successfully deny');
    }
}
