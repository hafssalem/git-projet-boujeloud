<?php

namespace App\Http\Controllers;

use App\Models\Autorisation;
use App\Models\Acteur;
use Illuminate\Http\Request;
use App\Exports\AutorisationExport;
use Maatwebsite\Excel\Facades\Excel;

class AutorisationController extends Controller
{

    public function index(Request $request)
    {  
        $search = $request->input('search');

    $autorisations = Autorisation::when($search, function ($query, $search) {
        return $query->where('date_debut', 'like', "%$search%")
                     ->orWhere('date_fin', 'like', "%$search%")
                     ->orWhere('statut', 'like', "%$search%");
    })->paginate(3);
        return view("projet.autorisations.index", compact("autorisations"));
    }

    public function create()
    {
        $acteurs = Acteur::all();
        return view('projet.autorisations.create', compact('acteurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'statut' => 'nullable|string|max:50',
            'id_acteur' => 'required|exists:acteur,id_acteur'
        ]);

        Autorisation::create($request->all());

        return redirect()->route('autorisations.index')
            ->with('success', 'Autorisation ajoutée avec succès');
    }

    public function edit(Autorisation $autorisation)
    {
        $acteurs = Acteur::all();
        return view('projet.autorisations.modification', compact('autorisation','acteurs'));
    }

    public function update(Request $request, Autorisation $autorisation)
    {
        $request->validate([
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'statut' => 'nullable|string|max:50',
            'id_acteur' => 'required|exists:acteur,id_acteur'
        ]);

        $autorisation->update($request->all());

        return redirect()->route('autorisations.index')
            ->with('success', 'Autorisation modifiée avec succès');
    }

    public function destroy(Autorisation $autorisation)
    {
        $autorisation->delete();

        return redirect()->route('autorisations.index')
            ->with('success', 'Autorisation supprimée');
    }

    public function export()
{
    return Excel::download(new AutorisationExport, 'autorisations.xlsx');
}
}