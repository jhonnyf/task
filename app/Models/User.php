<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['password', 'email', 'first_name', 'last_name'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function boards()
    {
        return $this->hasMany(Board::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
