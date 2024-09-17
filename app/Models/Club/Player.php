<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'team_id','user_id','password', 'picture', 'name', 'type', 'priority', 'dob', 'proof_id', 'phone', 'email', 'status',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
    protected $dates = ['deleted_at'];
}
