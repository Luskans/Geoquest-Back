<?php

namespace App\Http\Controllers;

use App\Models\Riddle;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StepController extends Controller
{
   /**
     * Affiche la liste des étapes pour une énigme donnée.
     */
    public function index($riddleId)
    {
        $riddle = Riddle::findOrFail($riddleId);
        $steps = $riddle->steps;       
        return response()->json($steps, Response::HTTP_OK);
    }

    /**
     * Crée une nouvelle étape pour une énigme donnée.
     */
    public function store(Request $request, $riddleId)
    {
        $validated = $request->validate([
            'order_number' => 'required|integer',
            'qr_code'      => 'required|string',
            'latitude'     => 'required|numeric',
            'longitude'    => 'required|numeric',
        ]);
        $validated['riddle_id'] = $riddleId;       
        $step = Step::create($validated);    
        return response()->json($step, Response::HTTP_CREATED);
    }

    /**
     * Affiche les détails d'une étape.
     */
    public function show($riddleId, $stepId)
    {
        $step = Step::where('riddle_id', $riddleId)->findOrFail($stepId);
        return response()->json($step, Response::HTTP_OK);
    }

    /**
     * Met à jour une étape.
     */
    public function update(Request $request, $riddleId, $stepId)
    {
        $step = Step::where('riddle_id', $riddleId)->findOrFail($stepId);
        $validated = $request->validate([
            'order_number' => 'sometimes|required|integer',
            'qr_code'      => 'sometimes|required|string',
            'latitude'     => 'sometimes|required|numeric',
            'longitude'    => 'sometimes|required|numeric',
        ]);
        $step->update($validated);
        return response()->json($step, Response::HTTP_OK);
    }

    /**
     * Supprime une étape.
     */
    public function destroy($riddleId, $stepId)
    {
        $step = Step::where('riddle_id', $riddleId)->findOrFail($stepId);
        $step->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
