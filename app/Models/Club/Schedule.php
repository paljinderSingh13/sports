<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
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
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
     public function OpTeam()
    {
        return $this->belongsTo(Team::class,'opposing_team_id','id');
    }

    protected $dates = ['deleted_at'];
}
