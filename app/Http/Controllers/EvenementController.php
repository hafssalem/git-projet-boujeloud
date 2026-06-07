<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Spectacle;
use Illuminate\Http\Request;
use App\Exports\EvenementExport;
<<<<<<< HEAD
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
class EvenementController extends Controller
{
    //

    public function statsEvenements()
{
    // عدد الأحداث حسب statut
    $statuts = DB::table('evenement')
        ->selectRaw('statut, COUNT(*) as total')
        ->groupBy('statut')
        ->pluck('total', 'statut');

    // عدد الأحداث حسب الأشهر (date_debut)
    $months = DB::table('evenement')
        ->selectRaw('COUNT(*) as total, MONTH(date_debut) as month')
        ->whereNotNull('date_debut')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month');

    return view('projet.evenements.stats', compact('statuts', 'months'));
}
=======
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class EvenementController extends Controller
{
>>>>>>> cb156e4 (Premier commit)
    
   public function index(Request $request)
    {  
        $search = $request->input('search');

    $evenements = Evenement::when($search, function ($query, $search) {
        return $query->where('date_debut', 'like', "%$search%")
                     ->orWhere('date_fin', 'like', "%$search%")
                     ->orWhere('frequence', 'like', "%$search%");
    })->with('spectacle')->paginate(3);
        return view("projet.evenements.index", compact("evenements"));
    }

    
    public function create()
    {
        $spectacles = Spectacle::all();

        return view('projet.evenements.create_evnt', compact('spectacles'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'frequence' => 'nullable|string|max:50',
            'saison' => 'nullable|string|max:50',
            'statut' => 'nullable|in:Planifie,En cours,Termine,Annule',
            'id_spectacle' => 'required|exists:spectacle,id_spectacle',
        ]);

        Evenement::create([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'frequence' => $request->frequence,
            'saison' => $request->saison,
            'statut' => $request->statut,
            'id_spectacle' => $request->id_spectacle,
        ]);

        return redirect()->route('evenements.index')
            ->with('success', 'Événement ajouté avec succès');
    }

    
    public function show(Evenement $evenement)
    {
        $evenement->load('spectacle');

        return view('projet.evenements.show', compact('evenement'));
    }

    
    public function edit(Evenement $evenement)
    {
        $spectacles = Spectacle::all();

        return view('projet.evenements.modification_evnt', compact('evenement', 'spectacles'));
    }

    
    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'frequence' => 'nullable|string|max:50',
            'saison' => 'nullable|string|max:50',
            'statut' => 'nullable|in:Planifie,En cours,Termine,Annule',
            'id_spectacle' => 'required|exists:spectacle,id_spectacle',
        ]);

        $evenement->update([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'frequence' => $request->frequence,
            'saison' => $request->saison,
            'statut' => $request->statut,
            'id_spectacle' => $request->id_spectacle,
        ]);
        $evenement->save();

        return redirect()->route('evenements.index')
            ->with('success', 'Événement modifié avec succès');
    }

    
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();

        return redirect()->route('evenements.index')
            ->with('success', 'Événement supprimé avec succès');
    }

    public function export()
{
    return Excel::download(new EvenementExport, 'evenements.xlsx');
}
<<<<<<< HEAD
=======

public function statsEvenements()
{
    $statuts = DB::table('evenement') // ✅ صحيحة
        ->select('statut', DB::raw('COUNT(*) as total'))
        ->groupBy('statut')
        ->pluck('total', 'statut');

    $months = DB::table('evenement') // ✅ صحيحة
        ->select(DB::raw('COUNT(*) as total'), DB::raw('MONTH(date_debut) as month'))
        ->whereNotNull('date_debut')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month');

    return view('projet.evenements.stats', compact('statuts', 'months'));
}
>>>>>>> cb156e4 (Premier commit)
}