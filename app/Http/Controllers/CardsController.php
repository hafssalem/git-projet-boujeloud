<?php

namespace App\Http\Controllers;

use App\Models\Acteur;
use App\Models\Groupe;
use App\Models\Spectacle;
use App\Models\Activite;
use App\Models\Evenement;
use App\Models\Autorisation;
use App\Models\Sanction;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    //
    public function index()
{
    $totalActeurs = Acteur::count();
    $totalGroupes = Groupe::count();
    $totalSpectacles = Spectacle::count();
    $totalActivites = Activite::count();
    $totalEvenements = Evenement::count();
    $totalAutorisations = Autorisation::count();
    $totalSanctions = Sanction::count();

    return view('dashboard.home', compact('totalActeurs', 'totalGroupes', 'totalSpectacles', 'totalActivites', 'totalEvenements', 'totalAutorisations', 'totalSanctions'));
}
}
