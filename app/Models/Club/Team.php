<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   use HasFactory;
    protected $fillable = [
        'club_id',
        'name',
        'age_group',
        'season',
        'password',
        'status',
    ];


    public function players()
    {
        return $this->hasMany(PlayerMetaTeam::class,'team_id','id');
    }

    

    protected $dates = ['deleted_at'];
}
