<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    /**
     * Affiche le classement général pour une période donnée (semaine, mois, total).
     */
    public function index(Request $request)
    {
        // Idéalement, le paramètre 'period' est passé dans la requête.
        // Retourner le top 5 (ou top N) et aussi la position de l'utilisateur dans ce classement.
    }
    
    /**
     * Affiche le classement pour une énigme donnée.
     */
    public function showByRiddle($riddleId)
    {
        // Retourner le classement (score total de chaque joueur) pour l'énigme spécifiée.
    }
}
