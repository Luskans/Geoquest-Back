<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'creator_id',
        'title',
        'description',
        'is_private', 
        'password',
        'difficulty',
        'show_distance',
        'status'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function gameSessions()
    {
        return $this->hasMany(GameSession::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
