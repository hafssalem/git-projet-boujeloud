<?php

namespace App\Http\Controllers;

use App\Models\Spectacle;
use Illuminate\Http\Request;
use App\Exports\SpectacleExport;
use Maatwebsite\Excel\Facades\Excel;

class SpectacleController extends Controller
{
    // Affichage

    public function index(Request $request)
    {  
        $search = $request->input('search');

    $spectacles = Spectacle::when($search, function ($query, $search) {
        return $query->where('titre', 'like', "%$search%")
                     ->orWhere('type', 'like', "%$search%")
                     ->orWhere('description', 'like', "%$search%");
    })->paginate(3);
        return view("projet.spectacles.index", compact("spectacles"));
    }

    // Form create
    public function create()
    {
        return view('projet.spectacles.create_spectacle');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:150',
            'type' => 'nullable|string',
            'description' => 'nullable|string',
            'langue' => 'nullable|string|max:50',
            'public_cible' => 'nullable|string|max:50',
            'duree' => 'nullable|integer',
            'nb_representations' => 'nullable|integer',
            'equipements' => 'nullable|string',
            'caractere' => 'nullable|in:Gratuit,Chapeau,Contribution libre,Payant',
            'classification' => 'nullable|in:Traditionnel,Contemporain,Fusion',
        ]);

        Spectacle::create($request->all());

        return redirect()->route('spectacles.index')
            ->with('success', 'Spectacle ajouté avec succès');
    }

    // Show
    public function show(Spectacle $spectacle)
    {
        return view('projet.spectacles.show', compact('spectacle'));
    }

    // Edit
    public function edit(Spectacle $spectacle)
    {
        return view('projet.spectacles.modification_spectacle', compact('spectacle'));
    }

    // Update
    public function update(Request $request, Spectacle $spectacle)
    {
        $request->validate([
            'titre' => 'required|string|max:150',
            'type' => 'nullable|string',
            'description' => 'nullable|string',
            'langue' => 'nullable|string|max:50',
            'public_cible' => 'nullable|string|max:50',
            'duree' => 'nullable|integer',
            'nb_representations' => 'nullable|integer',
            'equipements' => 'nullable|string',
            'caractere' => 'nullable|in:Gratuit,Chapeau,Contribution libre,Payant',
            'classification' => 'nullable|in:Traditionnel,Contemporain,Fusion',
        ]);

        $spectacle->update($request->all());

        return redirect()->route('spectacles.index')
            ->with('success', 'Spectacle modifié avec succès');
    }

    // Delete
    public function destroy(Spectacle $spectacle)
    {
        $spectacle->delete();

        return redirect()->route('spectacles.index')
            ->with('success', 'Spectacle supprimé');
    }

    public function export()
{
    return Excel::download(new SpectacleExport, 'spectacles.xlsx');
}
}
