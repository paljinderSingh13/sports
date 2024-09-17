<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'logo','user_id','name', 'address', 'city', 'state', 'country', 'postal_code', 'contact_name', 'phone', 'email'];

    
    protected $dates = ['deleted_at'];
}
