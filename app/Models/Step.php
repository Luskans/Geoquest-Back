<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        'game_id',
        'order_number',
        'qr_code',
        'latitude',
        'longitude'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function hints()
    {
        return $this->hasMany(Hint::class);
    }

    public function sessionSteps()
    {
        return $this->hasMany(SessionStep::class);
    }
}
