<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['card', 'sort', 'description', 'final_date'];

    public function checklists()
    {
        return $this->hasMany(Checklist::class)->where('active', '<>', 2);
    }
}
