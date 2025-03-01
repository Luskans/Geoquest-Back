<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'riddle_id',
        'score', 
    ];

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }

    public function riddle()
    {
        return $this->belongsTo(Riddle::class);
    }
}
