<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    // afficher liste
    public function index(){
        $permissions = Permission::all();
        return view('projet.permissions.index', compact('permissions'));
    }

    // afficher form ajout
    public function create(){
        return view('projet.permissions.create'); 
    }

    // insert
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:permissions|min:3'
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect()->route('permissions.index')
            ->with('success','Permission ajoutée avec succès.');
    }

    // afficher form modification
    public function edit($id){
        $permission = Permission::findOrFail($id);
        return view('projet.permissions.edit', compact('permission'));
    }

    // update
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:3|unique:permissions,name,'.$id
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->name
        ]);

        return redirect()->route('permissions.index')
            ->with('success','Permission modifiée avec succès.');
    }

    // delete
    public function destroy($id){
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('success','Permission supprimée.');
    }
}