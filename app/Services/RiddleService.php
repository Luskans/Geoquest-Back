<?php

namespace App\Services;

use App\Interfaces\RiddleServiceInterface;
use Illuminate\Support\Facades\DB;


class RiddleService implements RiddleServiceInterface
{
    public function getCreatedCount($userId)
    {
        return DB::table('riddles')
            ->where('creator_id', $userId)
            ->count();
    }

    public function getCreatedRiddles($userId, $limit, $offset)
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
}