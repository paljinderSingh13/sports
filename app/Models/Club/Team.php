<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
   use HasFactory, SoftDeletes;
    protected $fillable = [
        'club_id',
        'name',
        'age_group',
        'season',
        'password',
        'status',
    ];

    protected $dates = ['deleted_at'];
}
