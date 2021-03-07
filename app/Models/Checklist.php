<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = ['checklist'];

    public function items()
    {
        return $this->hasMany(ChecklistsItem::class)->where('active', '<>', 2);
    }
}
