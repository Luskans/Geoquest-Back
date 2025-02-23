<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
    protected $fillable = [
        'riddle_id',
        'player_id',
        'status',
        'start_time', 
        'end_time',
        'score'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function riddle()
    {
        return $this->belongsTo(Riddle::class);
    }

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }

    public function sessionSteps()
    {
        return $this->hasMany(SessionStep::class);
    }
}
