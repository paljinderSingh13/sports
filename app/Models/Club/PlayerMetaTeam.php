<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club\Team;


class PlayerMetaTeam extends Model
{
    use HasFactory;
    protected $table = 'player_meta_teams';
     protected $fillable = [
        'player_id','user_id','team_id',
    ];

     public function team()
    {
        return $this->belongsTo(Team::class);
    }

    protected $dates = ['deleted_at'];
    
}
