<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Affiche la liste des avis pour une énigme donnée.
     */
    public function index($riddleId)
    {
        // Retourner tous les reviews associés à l'énigme $riddleId.
    }
    
    /**
     * Crée un nouvel avis pour une énigme.
     */
    public function store(Request $request, $riddleId)
    {
        // Valider et créer un avis, associant le riddle et l’utilisateur.
    }
    
    /**
     * Affiche un avis spécifique.
     */
    public function show($riddleId, $reviewId)
    {
        // Retourner le review $reviewId.
    }
    
    /**
     * Met à jour un avis.
     */
    public function update(Request $request, $riddleId, $reviewId)
    {
        // Mettre à jour le review $reviewId.
    }
    
    /**
     * Supprime un avis.
     */
    public function destroy($riddleId, $reviewId)
    {
        // Supprimer le review $reviewId.
    }
}
