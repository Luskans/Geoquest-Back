<?php

namespace App\Services;

use App\Interfaces\ScoreServiceInterface;
use Illuminate\Support\Facades\DB;


class ScoreService implements ScoreServiceInterface
{
    public function getRankingByPeriod(string $period, ?int $limit, ?int $offset = null)
    {
        $query = DB::table('global_scores')
            ->join('users', 'global_scores.user_id', '=', 'users.id')
            ->select('users.username', 'users.image', 'global_scores.score')
            ->where('global_scores.period', '=', $period)
            ->orderByDesc('global_scores.score');

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        if (!is_null($offset)) {
            $query->offset($offset);
        }

        return $query->get();
    }

    public function getUserRankByPeriod(string $period, int $userId)
    {
        $userScore = DB::table('global_scores')
            ->where('user_id', $userId)
            ->where('period', $period)
            ->value('score');

        if (!$userScore) {
            return null;
        }

        $userRank = DB::table('global_scores')
            ->where('period', $period)
            ->where('score', '>', $userScore)
            ->count() + 1;

        return [
            'score' => $userScore,
            'rank' => $userRank,
        ];
    }

    // public function getPlayerRankByPeriodAndName(string $period, string $playerName)
    // {
    //     $playerData = DB::table('global_scores')
    //         ->join('users', 'global_scores.user_id', '=', 'users.id')
    //         ->select('users.username', 'users.image', 'global_scores.score')
    //         ->where('global_scores.period', '=', $period)
    //         ->where('users.username', $playerName)
    //         ->first();

    //     if (is_null($playerData)) {
    //         return null;
    //     }

    //     $playerRank = DB::table('global_scores')
    //         ->where('period', $period)
    //         ->where('score', '>', $playerData->score)
    //         ->count() + 1;
        
    //     return [
    //         'username' => $playerData->username,
    //         'image' => $playerData->image,
    //         'score' => $playerData->score,
    //         'rank' => $playerRank,
    //     ];
    // }

    // public function getPlayersAutocomplete(string $searchName, string $playerName)
    // {
        
    // }
}