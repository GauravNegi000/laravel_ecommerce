<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'dob',
        'profile_image',
    ];

    // function to get the user that owns this detail
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
