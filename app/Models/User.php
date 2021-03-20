<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public  function roles() 
    {
        return $this->belongsToMany(Role::class);
    }

    // function to check whether the user has particular role or not
    public function hasRole($role) 
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    // function to get the userdetail assosicated with the user  
    public function userDetail() 
    {
        return $this->hasOne(UserDetail::class);
    }

    // function to get the addresses assosicated with the user  
    public function addresses() 
    {
        return $this->hasMany(Address::class);
    }
}
