<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HintController extends Controller
{
    /**
     * Liste les indices pour une étape donnée.
     */
    public function index($stepId)
    {
        // Retourner tous les indices de l’étape $stepId.
    }
    
    /**
     * Crée un nouvel indice pour une étape.
     */
    public function store(Request $request, $stepId)
    {
        // Valider et créer un indice pour l’étape $stepId.
    }

    /**
     * Affiche les détails d’un indice.
     */
    public function show($stepId, $hintId)
    {
        // Retourner les détails de l’indice $hintId pour l’étape $stepId.
    }

    /**
     * Met à jour un indice.
     */
    public function update(Request $request, $stepId, $hintId)
    {
        // Mettre à jour l’indice.
    }

    /**
     * Supprime un indice.
     */
    public function destroy($stepId, $hintId)
    {
        // Supprimer l’indice.
    }
}
