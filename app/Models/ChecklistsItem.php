<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistsItem extends Model
{
    use HasFactory;

    protected $fillable = ['checklist_item'];
}
