<?php

namespace App\Services;

use App\Interfaces\GameServiceInterface;
use Illuminate\Support\Facades\DB;


class RiddleService implements GameServiceInterface
{
    public function getParticipatedCount(int $userId)
    {
        return DB::table('game_sessions')
            ->where('player_id', $userId)
            ->count();
    }

    public function getActiveRiddle(int $userId)
    {
        return DB::table('game_sessions')
            ->where('player_id', $userId)
            ->where('status', 'active');
    }
}