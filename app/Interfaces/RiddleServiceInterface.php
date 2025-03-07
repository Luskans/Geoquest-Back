<?php

namespace App\Interfaces;


interface RiddleServiceInterface
{
    public function getCreatedCount(int $userId);

    public function getCreatedRiddles(int $userId, ?int $limit, ?int $offset);
}