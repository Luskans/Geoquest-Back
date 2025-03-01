<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riddle extends Model
{
    use HasFactory;

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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
