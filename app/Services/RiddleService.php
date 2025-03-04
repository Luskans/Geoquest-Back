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
}