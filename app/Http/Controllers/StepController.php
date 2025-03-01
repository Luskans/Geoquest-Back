<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Affiche la liste des étapes pour une énigme donnée.
     */
    public function index($riddleId)
    {
        // Retourner toutes les étapes associées à l’énigme $riddleId.
    }

    /**
     * Crée une nouvelle étape pour une énigme donnée.
     */
    public function store(Request $request, $riddleId)
    {
        // Valider et enregistrer une étape pour le riddle $riddleId.
    }

    /**
     * Affiche les détails d'une étape.
     */
    public function show($riddleId, $stepId)
    {
        // Retourner les détails de l’étape $stepId du riddle $riddleId.
    }

    /**
     * Met à jour une étape.
     */
    public function update(Request $request, $riddleId, $stepId)
    {
        // Mettre à jour l’étape indiquée.
    }

    /**
     * Supprime une étape.
     */
    public function destroy($riddleId, $stepId)
    {
        // Supprimer l’étape.
    }
}
