<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProposeProposal;


class ProposalModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProposalCreator_name',
        'Proposal_Title',
        'Proposal_date',
        'statusbyHOSD',
        'statusbyCoordinator',
        'statusbyDean',
        'Proposal_description',
        'Proposal_objective'
    ];

    public function propose(){
        return $this->hasOne(ProposeProposal::class);
    }
}
