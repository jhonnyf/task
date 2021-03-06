<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    protected $fillable = ['column', 'sort'];

    public function cards()
    {
        return $this->hasMany(Card::class)->orderBy('sort', 'asc');
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
