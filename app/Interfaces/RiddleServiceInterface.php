<?php

namespace App\Interfaces;


interface RiddleServiceInterface
{
    public function getCreatedCount(int $userId);

    public function getCreatedList(int $userId, ?int $limit, ?int $offset);

    public function getRiddleDetail(int $id);
}