<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameSessionController extends Controller
{
    /**
     * Affiche la liste des sessions de jeu de l'utilisateur.
     */
    public function index()
    {
        // Retourner les sessions de jeu de l’utilisateur (historique, en cours, etc.)
    }
    
    /**
     * Démarre une nouvelle session de jeu pour une énigme.
     */
    public function store(Request $request)
    {
        // Créer une nouvelle session de jeu pour le riddle spécifié, retourner la session créée.
    }
    
    /**
     * Affiche les détails d'une session de jeu.
     */
    public function show($id)
    {
        // Retourner les informations détaillées de la session de jeu $id.
    }
    
    /**
     * Met à jour le statut ou les informations d'une session de jeu (exemple: passe à 'completed').
     */
    public function update(Request $request, $id)
    {
        // Mettre à jour la session de jeu $id.
    }
    
    /**
     * Optionnel : Supprime ou annule une session de jeu.
     */
    public function destroy($id)
    {
        // Supprimer la session de jeu.
    }
}
