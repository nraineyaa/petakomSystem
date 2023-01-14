<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinModel extends Model
{
    use HasFactory;
    protected $table ='bulletin';
    protected $primaryKey = 'id';
    protected $fillable = ['committee_ID','author_name','news_title','news_description','updateBy'];
}
