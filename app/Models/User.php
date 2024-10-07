<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Club\Team;
use App\Models\Club\Club;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ROLE_CLUB = 'club';
    const ROLE_TEAM = 'team';
    const ROLE_PLAYER = 'player';
    const ROLE_ADMINISTRATOR = 'administrator';
    const ROLE_MASTER = 'master';

    // Check if user has a specific role
    public function hasRole($role)
    {
        return $this->role === $role;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password','role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function club()
    {
        return $this->belongsTo(Club::class,'id','user_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

protected $dates = ['deleted_at'];
    
}
