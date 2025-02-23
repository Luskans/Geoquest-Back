<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'riddle_id',
        'user_id',
        'content',
        'rating'
    ];

    public function riddle()
    {
        return $this->belongsTo(Riddle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
