<?php

namespace App\Services;

use App\Interfaces\RiddleServiceInterface;
use App\Models\Riddle;
use Illuminate\Support\Facades\DB;


class RiddleService implements RiddleServiceInterface
{
    public function getCreatedCount($userId)
    {
        return DB::table('riddles')
            ->where('creator_id', $userId)
            ->count();
    }

    public function getCreatedList($userId, $limit, $offset)
    {
        $query = DB::table('riddles')
            ->select('id', 'title', 'is_private', 'status', 'created_at')
            ->where('creator_id', $userId)
            ->orderByDesc('created_at');

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        if (!is_null($offset)) {
            $query->offset($offset);
        }

        return $query->get();
    }

    public function getRiddleDetail($id)
    {
        return Riddle::with([
            'steps.hints',
            'reviews',
            'gameSession'
        ])->find($id);
    }
}