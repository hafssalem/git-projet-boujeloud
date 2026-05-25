<?php

namespace App\Http\Controllers;

use App\Models\Acteur;
use App\Models\Activite;
use App\Models\Groupe;
use Illuminate\Http\Request;
use App\Exports\ActiviteExport;
use Maatwebsite\Excel\Facades\Excel;


class ActiviteController extends Controller
{

public function export()
{
    return Excel::download(new ActiviteExport, 'activites.xlsx');
}
    //  Affichage
   public function index(Request $request)
{
    $search = $request->input('search');

    $activites = Activite::with(['acteur', 'groupe'])
        ->when($search, function ($query, $search) {

            return $query->where('type_performance', 'like', "%$search%")
                ->orWhere('mode_exercice', 'like', "%$search%")
                ->orWhere('frequence', 'like', "%$search%");
        })
        ->paginate(3);

    return view("projet.activites.index", compact("activites"));
}

    //  Form création
    public function create()
    {
    $acteurs = Acteur::all();
    $groupes = Groupe::all();
    return view("projet.activites.create_activite", compact("acteurs", "groupes"));    }

    //  Enregistrement
    public function store(Request $request)
    {
        $request->validate([
            'type_performance' => 'nullable|string|max:255',
            'mode_exercice' => 'nullable|in:Individuel,Groupe,Association',
            'frequence' => 'nullable|in:Quotidienne,Hebdomadaire,Occasionnelle,Saisonniere',
            'lieu' => 'nullable|string|max:255',
            'langue' => 'nullable|string|max:50',
            'type_lien' => 'required|in:acteur,groupe',
            'id_acteur' => 'nullable|exists:acteur,id_acteur',
            'id_groupe' => 'nullable|exists:groupe,id_groupe'
        ]);

        $id_acteur = null;
        $id_groupe = null;

           if ($request->type_lien === 'acteur') {
               $id_acteur = $request->id_acteur;
            }

            if ($request->type_lien === 'groupe') {
               $id_groupe = $request->id_groupe;
            }
        Activite::create([
            "type_performance" => $request->type_performance,
            "mode_exercice" => $request->mode_exercice,
            "frequence" => $request->frequence,
            "lieu" => $request->lieu,
            "langue" => $request->langue,
            "id_acteur" => $id_acteur,
            "id_groupe" => $id_groupe
        ]);

        return redirect()->route('activites.index')
            ->with('success', 'Activité ajoutée avec succès.');
    }

    //  Affichage détail
    public function show(Activite $activite)
    {
            $acteurs = Acteur::all();
            $groupes = Groupe::all();
        return view("projet.activites.show_activite", compact("activite", "acteurs", "groupes"));
    }

    //  Form modification
    public function edit(Activite $activite)
    {
    $acteurs = Acteur::all();
    $groupes = Groupe::all();
    return view("projet.activites.modifier_activite", compact("activite", "acteurs", "groupes"));    }

    //  Update
    public function update(Request $request, Activite $activite)
    {
        $request->validate([
            'type_performance' => 'nullable|string|max:255',
            'mode_exercice' => 'nullable|in:Individuel,Groupe,Association',
            'frequence' => 'nullable|in:Quotidienne,Hebdomadaire,Occasionnelle,Saisonniere',
            'lieu' => 'nullable|string|max:255',
            'langue' => 'nullable|string|max:50',
            'id_acteur' => 'nullable|exists:acteur,id_acteur',
            'id_groupe' => 'nullable|exists:groupe,id_groupe'
            ]);
            $id_acteur = null;
            $id_groupe = null;

          if ($request->type_lien === 'acteur') {

              $id_acteur = $request->id_acteur;
            }

           if ($request->type_lien === 'groupe') {

                 $id_groupe = $request->id_groupe;
                }

        $activite->update([
            "type_performance" => $request->type_performance,
            "mode_exercice" => $request->mode_exercice,
            "frequence" => $request->frequence,
            "lieu" => $request->lieu,
            "langue" => $request->langue,
            "id_acteur" => $id_acteur,
            "id_groupe" => $id_groupe
        ]);

        return redirect()->route('activites.index')
            ->with('success', 'Activité modifiée avec succès.');
    }

    //  Suppression
    public function destroy(Activite $activite)
    {
        $activite->delete();

        return redirect()->route('activites.index')
            ->with('success', 'Activité supprimée avec succès.');
    }
}