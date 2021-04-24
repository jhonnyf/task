<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['team'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function boards()
    {
        return $this->belongsToMany(Board::class);
    }
}
