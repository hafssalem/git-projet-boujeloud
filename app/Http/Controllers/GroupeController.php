<?php 

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Acteur;
use App\Exports\GroupeExport;
use Maatwebsite\Excel\Facades\Excel;

class GroupeController extends Controller
{
    // Affichage
    public function index(Request $request)
    {  
    $search = $request->input('search');

    $groupes = Groupe::with('acteurs')
        ->when($search, function ($query, $search) {
            return $query->where('nom', 'like', "%$search%")
                         ->orWhere('description', 'like', "%$search%");
        })
        ->paginate(3);

    return view("projet.groupes.index", compact("groupes"));
    }

    // Form création
    public function create()
    {
        $acteurs = Acteur::all();
        return view("projet.groupes.create_groupe", compact('acteurs'));
    }

    // Enregistrement
   public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:100',
        'date_creation' => 'nullable|date',
        'description' => 'nullable|string',
        'logo' => 'image|mimes:png,jpg,jpeg|max:8000',
        'acteurs' => 'required|array|min:2'
    ]);

    $logoName = null;

    if ($request->hasFile('logo')) {

        $logoName = time() . '.' . $request->logo->extension();

        $request->logo->storeAs('logos', $logoName, 'public');
    }

    // مهم
    $groupe = Groupe::create([
        'nom' => $request->nom,
        'date_creation' => $request->date_creation,
        'description' => $request->description,
        'logo' => $logoName
    ]);

    // insertion membres
    $groupe->acteurs()->attach($request->acteurs);

    return redirect()->route('groupes.index')
        ->with('success', 'Groupe ajouté avec succès.');
}

    // Show
    public function show(Groupe $groupe)
    {
        $groupe->load('acteurs');
        return view("projet.groupes.show", compact("groupe"));
    }

    // Edit
    public function edit(Groupe $groupe)
    {
        $acteurs = Acteur::all();
        return view("projet.groupes.modifier_groupe", compact("groupe", "acteurs"));
    }

    // Update
    public function update(Request $request, Groupe $groupe)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'date_creation' => 'nullable|date',
            'description' => 'nullable|string',
            'logo' => 'image|mimes:png,jpg,jpeg|max:8000',
            'acteurs' => 'required|array|min:2'
        ]);

        $logoName = $groupe->logo;

        if ($request->hasFile('logo')) {

            if ($groupe->logo) {
                Storage::disk('public')->delete('logos/' . $groupe->logo);
            }

            $logoName = time() . '.' . $request->logo->extension();
            $request->logo->storeAs('logos', $logoName, 'public');
        }

        $groupe->update([
            'nom' => $request->nom,
            'date_creation' => $request->date_creation,
            'description' => $request->description, // ✔️ تصحيح
            'logo' => $logoName
        ]);

        $groupe->acteurs()->sync($request->acteurs);

        return redirect()->route('groupes.index')
            ->with('success', 'Groupe modifié.');
    }

    // Delete
    public function destroy(Groupe $groupe)
    {
        // نحيد حتى الصورة
        if ($groupe->logo) {
            Storage::disk('public')->delete('logos/' . $groupe->logo);
        }
        $groupe->acteurs()->detach();
        $groupe->delete();

        return redirect()->route('groupes.index')
            ->with('success', 'Groupe supprimé.');
    }

    public function export()
{
    return Excel::download(new GroupeExport, 'groupes.xlsx');
}
}