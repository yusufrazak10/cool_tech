<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // <-- Add this line

class User extends Authenticatable
{
    use Notifiable, HasFactory;  // <-- Include HasFactory here
    
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];
    
    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    /**
     * Check if the user is an editor.
     *
     * @return bool
     */
    public function isEditor()
    {
        return $this->role === 'editor';
    }
}


