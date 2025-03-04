<?php

namespace App\Http\Controllers;

use App\Interfaces\ScoreServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    protected $scoreService;

    public function __construct(ScoreServiceInterface $scoreService)
    {
        $this->scoreService = $scoreService;
    }

    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $period = $request->get('period', 'week');
        $limit = $request->get('limit', 0);
        $offset = $request->get('offset', 0);
        
        $ranking = $this->scoreService->getRankingByPeriod($period, $limit, $offset);
        $userRanking = $this->scoreService->getUserRankByPeriod($period, $user->id);

        return response()->json([
            'ranking' => $ranking,
            'userRanking' => $userRanking,
        ], Response::HTTP_OK);
    }

    // public function index(Request $request): JsonResponse
    // {
    //     $user = $request->user();
    //     $period = $request->get('period', 'week');
    //     $limit = $request->get('limit') ? (int) $request->get('limit') : null;
    //     $offset = (int) $request->get('offset', 0);
    //     $searchName = $request->get('name');

    //     if ($searchName) {
    //         $ranking = $this->scoreService->getPlayerRankByPeriodAndName($period, $searchName);
    //     } else {
    //         $ranking = $this->scoreService->getRankingByPeriod($period, $limit, $offset);
    //     }

    //     // Récupérer notamment le rang de l'utilisateur
    //     $userRanking = $this->scoreService->getUserRankByPeriod($period, $user->id);

    //     return response()->json([
    //         'ranking' => $ranking,
    //         'userRanking' => $userRanking,
    //     ], Response::HTTP_OK);
    // }

    public function showByRiddle($riddleId): JsonResponse
    {
        $leaderboard = DB::table('game_scores')
            ->join('users', 'game_scores.player_id', '=', 'users.id')
            ->select('game_scores.player_id', 'users.username', 'game_scores.score')
            ->where('game_scores.riddle_id', $riddleId)
            ->orderByDesc('game_scores.score')
            ->get();
        
        return response()->json([
            'riddle_id'   => $riddleId,
            'leaderboard' => $leaderboard,
        ], Response::HTTP_OK);
    }
}
