<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['board'];

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function team()
    {
        return $this->belongsToMany(Team::class);
    }

    public function columns()
    {
        return $this->hasMany(Column::class)
            ->where('active', '<>', 2)
            ->orderBy('sort', 'asc');
    }
}
