<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Election extends Model //extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'election';

    protected $fillable = [
        'id',
        'user_id',
        'profile_img',
        'student_ID',
        'full_name',
        'crt_semester',
        'crt_result',
        'prv_activities',
        'manifesto',
        'status',
    ];
}
