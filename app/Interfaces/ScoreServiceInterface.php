<?php

namespace App\Interfaces;


interface ScoreServiceInterface
{
    public function getRankingByPeriod(string $period, ?int $limit, ?int $offset = null);

    public function getUserRankByPeriod(string $period, int $userId);

    // public function getPlayerRankByPeriodAndName(string $period, string $playerName);

    // public function getPlayersAutocomplete(string $searchName, int $limit = 5);
}