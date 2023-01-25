<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProposalModel;

class ProposeProposal extends Model
{
    use HasFactory;

    public function Proposal(){
        return $this->belongsTo(Proposal::class);
    }
}
