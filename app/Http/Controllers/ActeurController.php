<?php

namespace App\Http\Controllers;

use App\Models\Acteur;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\ActeurExport;
use Maatwebsite\Excel\Facades\Excel;

class ActeurController extends Controller
{
<<<<<<< HEAD
    //

=======
    
>>>>>>> cb156e4 (Premier commit)
public function export()
{
    return Excel::download(new ActeurExport, 'acteurs.xlsx');
}
    // Affichage
    public function index(Request $request)
    {  
        $search = $request->input('search');

    $acteurs = Acteur::when($search, function ($query, $search) {
<<<<<<< HEAD
                    $query->where('nom_prenom', 'like', '%'. $search . '%')
                     ->orWhere('cin_passport', 'like', '%'. $search . '%')
                     ->orWhere('email', 'like', '%'. $search . '%');
=======
        return $query->where('nom_prenom', 'like', "%$search%")
                     ->orWhere('cin_passport', 'like', "%$search%")
                     ->orWhere('email', 'like', "%$search%");
>>>>>>> cb156e4 (Premier commit)
    })->paginate(3);
        return view("projet.acteurs.index", compact("acteurs"));
    }

    // Form création
    public function create()
    {
        return view("projet.acteurs.create_acteur");
    }

    // Enregistrement
    public function store(Request $request)
    {
        
        $request->validate([
            'nom_prenom' => 'required|regex:/^[A-Za-z\s]+$/',
            'date_naissance' => 'required|date',
            'cin_passport' => 'required|string|max:10|unique:acteur,cin_passport',
            'nationalite' => 'required|string|max:50',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email|unique:acteur,email',
            'date_inscription' => 'required|date',
            'statut' => 'required|in:Actif,Suspendu,Archive',
            'photo' => 'image|mimes:png,jpg,jpeg|max:8000'
        ]);

        $photoName = null;

    if ($request->hasFile('photo')) {
    $photoName = time() . '.' . $request->photo->extension();
    $request->photo->storeAs('photos', $photoName, 'public');
}
        Acteur::create([
            "nom_prenom" => $request->nom_prenom,
            "date_naissance" => $request->date_naissance,
            "cin_passport" => $request->cin_passport,
            "nationalite" => $request->nationalite,
            "adresse" => $request->adresse,
            "telephone" => $request->telephone,
            "email" => $request->email,
            "date_inscription" => $request->date_inscription,
            "statut" => $request->statut,
            "photo" => $photoName
        ]);

        return redirect()->route('acteurs.index')
            ->with('success', 'Acteur ajouté avec succès.');
    }

    // Affichage détail
    public function show(Acteur $acteur)
    {
        return view("projet.acteurs.show_acteur", compact("acteur"));
    }

    // Form modification
    public function edit(Acteur $acteur)
    {
        return view("projet.acteurs.modifier_acteur", compact("acteur"));
    }

    // Update
    public function update(Request $request, Acteur $acteur)
    {
        $request->validate([
    'nom_prenom' => 'required|regex:/^[A-Za-z\s]+$/',
    'date_naissance' => 'required|date',
    'cin_passport' => 'required|string|max:10|unique:acteur,cin_passport,' . $acteur->id_acteur . ',id_acteur',
    'nationalite' => 'required|string|max:50',
    'adresse' => 'required|string|max:255',
    'telephone' => 'required|regex:/^[0-9]{10}$/',
    'email' => 'required|email|unique:acteur,email,' . $acteur->id_acteur . ',id_acteur',
    'date_inscription' => 'required|date',
    'statut' => 'required|in:Actif,Suspendu,Archive',
    'photo' => 'image|mimes:png,jpg,jpeg|max:8000'
]);

if ($request->hasFile('photo')) {

    if ($acteur->photo) {
        Storage::disk('public')->delete('photos/' . $acteur->photo);
    }

    $photoName = time() . '.' . $request->photo->extension();
<<<<<<< HEAD
    $request->photo->storeAs('photos', $photoName, 'public'); 
   } else {
      $photoName = $acteur->photo;
=======
    $request->photo->storeAs('photos', $photoName, 'public');

    $acteur->photo = $photoName;
>>>>>>> cb156e4 (Premier commit)
}

$acteur->update([
    'nom_prenom' => $request->nom_prenom,
    'date_naissance' => $request->date_naissance,
    'cin_passport' => $request->cin_passport,
    'nationalite' => $request->nationalite,
    'adresse' => $request->adresse,
    'telephone' => $request->telephone,
    'email' => $request->email,
    'date_inscription' => $request->date_inscription,
    'statut' => $request->statut,
<<<<<<< HEAD
    'photo'  => $photoName,
]);

        // $acteur->save();
=======
]);

        $acteur->save();
>>>>>>> cb156e4 (Premier commit)

        return redirect()->route('acteurs.index')
            ->with('success', 'Acteur modifié avec succès.');
    }

    // Delete
    public function destroy(Acteur $acteur)
    {
        if ($acteur->photo) {
            Storage::disk('public')->delete('photos/' . $acteur->photo);
        }
<<<<<<< HEAD
        $acteur->groupes()->detach();
=======

>>>>>>> cb156e4 (Premier commit)
        $acteur->delete();

        return redirect()->route('acteurs.index')
            ->with('success', 'Acteur supprimé avec succès.');
    }

}