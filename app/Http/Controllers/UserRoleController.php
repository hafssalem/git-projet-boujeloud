<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    // 📌 INDEX
    public function index()
    {
        $users = User::with('roles')->get();
        return view('projet.users.index', compact('users'));
    }

    // 📌 CREATE
    public function create()
    {
        $roles = Role::all();
        return view('projet.users.create', compact('roles'));
    }

    // 📌 STORE
    public function store(Request $request)
    {
       $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:6',
    'roles' => 'required|array',
    'roles.*' => 'exists:roles,name'
]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success', 'User created');
    }

    // 📌 EDIT
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('projet.users.edit', compact('user', 'roles'));
    }

    // 📌 UPDATE
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success', 'Updated');
    }

    // 📌 DELETE
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Deleted');
    }
}