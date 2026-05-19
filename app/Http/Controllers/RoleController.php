<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('projet.roles.index', compact('roles'));
    }

    public function create(){
        return view('projet.roles.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles'
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('roles.index')->with('success','Role ajouté');
    }

    public function edit($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('projet.roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, $id){
        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name
        ]);

        // sync permissions
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success','Role modifié');
    }

    public function destroy($id){
        Role::findOrFail($id)->delete();
        return back()->with('success','Role supprimé');
    }
}