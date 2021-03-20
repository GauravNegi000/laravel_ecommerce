<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city_id',
        'name',
        'address',
        'postal_code',
        'mobile',
        'landmark',
    ];

    // function to get the user that owns this detail
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    // function to get the city that owns this detail
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
