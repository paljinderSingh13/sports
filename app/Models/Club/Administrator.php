<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrator extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'team_id',
        'name',
        'type',
        'phone',
        'email',
        'status',
    ];

    protected $dates = ['deleted_at'];
}
