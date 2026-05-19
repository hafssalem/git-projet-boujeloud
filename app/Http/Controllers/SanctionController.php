<?php

namespace App\Http\Controllers;

use App\Models\Sanction;
use App\Models\Acteur;
use Illuminate\Http\Request;
use App\Exports\SanctionExport;
use Maatwebsite\Excel\Facades\Excel;

class SanctionController extends Controller
{
    public function index(Request $request)
    {  
        $search = $request->input('search');

    $sanctions = Sanction::when($search, function ($query, $search) {
        return $query->where('type', 'like', "%$search%")
                     ->orWhere('description', 'like', "%$search%");
    })->paginate(3);
        return view("projet.sanctions.index", compact("sanctions"));
    }

    public function create()
    {
        $acteurs = Acteur::all();
        return view('projet.sanctions.ajoute', compact('acteurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
            'id_acteur' => 'required|exists:acteur,id_acteur'
        ]);

        Sanction::create($request->all());

        return redirect()->route('sanctions.index')
            ->with('success', 'Sanction ajoutée avec succès');
    }

    public function edit(Sanction $sanction)
    {
        $acteurs = Acteur::all();
        return view('projet.sanctions.modification', compact('sanction','acteurs'));
    }

    public function update(Request $request, Sanction $sanction)
    {
        $request->validate([
            'type' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
            'id_acteur' => 'required|exists:acteur,id_acteur'
        ]);

        $sanction->update($request->all());

        return redirect()->route('sanctions.index')
            ->with('success', 'Sanction modifiée');
    }

    public function destroy(Sanction $sanction)
    {
        $sanction->delete();

        return redirect()->route('sanctions.index')
            ->with('success', 'Sanction supprimée');
    }
    public function export()
{
    return Excel::download(new SanctionExport, 'sanctions.xlsx');
}
}