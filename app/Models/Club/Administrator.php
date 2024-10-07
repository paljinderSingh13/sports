<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id',
        'user_id',
        'name',
        'type',
        'phone',
        'email',
        'status',
    ];

    public function teamAdmin()
    {
        return $this->belongsTo(Team::class,'team_id','id');
    }

    protected $dates = ['deleted_at'];

}
