<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'added_by', // Track who added the user
        'department_id', // Make sure to include this in fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Self-referencing relationship to track the user who added another user
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function addedUsers()
    {
        return $this->hasMany(User::class, 'added_by');
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    
}
