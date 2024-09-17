<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'type',
        'team',
        'location',
        'city',
        'date',
        'time',
        'date_from',
        'date_to',
        'time_from',
        'time_to',
        'purpose_detail',
        'status',
    ];
    protected $dates = ['deleted_at'];
}
