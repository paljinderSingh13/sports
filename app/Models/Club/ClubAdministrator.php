<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ClubAdministrator extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'club_id',
        'user_id',
        'name',
        'image',
        'role',
        'phone',
        'email',
        'status'
    ];
protected $dates = ['deleted_at'];
}
