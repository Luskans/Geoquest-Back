<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiddleController extends Controller
{
    /**
     * Affiche la liste des énigmes (peut servir pour l’index de l’onglet "riddle").
     */
    public function index()
    {
        // Retourner tous les riddles, éventuellement paginés.
    }

    /**
     * Crée une nouvelle énigme.
     */
    public function store(Request $request)
    {
        // Valider et enregistrer un nouveau riddle.
    }

    /**
     * Affiche les détails d'une énigme.
     */
    public function show($id)
    {
        // Retourner les détails du riddle identifié par $id.
    }

    /**
     * Met à jour une énigme existante.
     */
    public function update(Request $request, $id)
    {
        // Valider et mettre à jour le riddle identifié par $id.
    }

    /**
     * Supprime une énigme.
     */
    public function destroy($id)
    {
        // Supprimer le riddle identifié par $id.
    }
}
