<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;

class ProposeActivity extends Model
{
    use HasFactory;

    public function Activity(){
        return $this->belongsTo(Activity::class);
    }
}
