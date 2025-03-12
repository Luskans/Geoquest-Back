<?php

namespace App\Http\Controllers;

use App\Interfaces\RiddleServiceInterface;
use App\Models\Riddle;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class RiddleController extends Controller
{
    protected $riddleService;

    public function __construct(RiddleServiceInterface $riddleService)
    {
        $this->riddleService = $riddleService;
    }

    /**
     * Affiche la liste de toutes les énigmes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $riddles = Riddle::all();
        return response()->json($riddles, Response::HTTP_OK);
    }

    /**
     * Crée une nouvelle énigme.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string',
            'description'   => 'required|string',
            'is_private'    => 'boolean',
            'password'      => 'nullable|string',
            'difficulty'    => 'required|integer',
            'show_distance' => 'required|boolean',
            'status'        => 'required|in:draft,active,disabled',
        ]);
        $validated['creator_id'] = $request->user()->id;
        $riddle = Riddle::create($validated);
        return response()->json($riddle, Response::HTTP_CREATED);
    }

    /**
     * Affiche les détails d'une énigme.
     *
     * @param  \App\Models\Riddle  $riddle
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Riddle $riddle)
    {
        // return response()->json($riddle, Response::HTTP_OK);
        $riddle->load(['steps.hints', 'reviews', 'gameSessions']);
        return response()->json(['riddle' => $riddle], Response::HTTP_OK);
    }

    /**
     * Met à jour une énigme existante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Riddle  $riddle
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Riddle $riddle)
    {
        $validated = $request->validate([
            'title'         => 'sometimes|required|string',
            'description'   => 'sometimes|required|string',
            'is_private'    => 'sometimes|boolean',
            'password'      => 'nullable|string',
            'difficulty'    => 'sometimes|required|integer',
            'show_distance' => 'sometimes|required|boolean',
            'status'        => 'sometimes|required|in:draft,active,disabled'
        ]);
        $riddle->update($validated);
        return response()->json($riddle, Response::HTTP_OK);
    }

    /**
     * Supprime une énigme.
     *
     * @param  \App\Models\Riddle  $riddle
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Riddle $riddle)
    {
        $riddle->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function getCreatedRiddles(Request $request): JsonResponse
    {
        $user = $request->user();
        $limit = $request->get('limit', 20);
        $offset = $request->get('offset', 0);
        $createdList = $this->riddleService->getCreatedList($user->id, $limit, $offset);

        return response()->json([
            'riddles' => $createdList
        ], Response::HTTP_OK);
    }

    public function getRiddleDetail(Request $request): JsonResponse
    {
        $user = $request->user();
        $id = $request->get('id');
        $createdDetail = $this->riddleService->getRiddleDetail($id);

        return response()->json([
            'riddle' => $createdDetail
        ], Response::HTTP_OK);
    }
}
