<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['password', 'email', 'first_name', 'last_name'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function boards()
    {
        $board_id = [];
        $User     = User::find(Auth::user()->id);

        foreach ($User->teams as $team) {
            foreach ($team->boards as $board) {
                $board_id[] = $board->id;
            }

        }

        return $this->belongsToMany(Board::class)->whereNotIn('board_id', $board_id);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)->using(TeamUser::class)->withPivot('responsibility_id');
    }
}
