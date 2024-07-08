<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class TampilUserRoleController extends Controller
{
    public function index()
    {
        // Fetch all users with their roles
        $users = User::with('roles')->get();

        // Fetch data directly from model_has_roles table
        $modelHasRoles = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('users', 'model_has_roles.model_id', '=', 'users.id')
            ->select('users.name as user_name', 'roles.name as role_name')
            ->get();

        // Pass the users and modelHasRoles data to the view
        return view('superadmin.tampiluser', compact('users', 'modelHasRoles'));
    }

    public function editRole(User $user)
    {
        // Fetch all available roles
        $roles = Role::all();

        // Fetch all users except the one being edited
        $users = User::where('id', '!=', $user->id)->get();

        return view('superadmin.editrole', compact('user', 'roles', 'users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required|array',
        ]);

        // Fetch the roles based on selected IDs
        $roles = Role::whereIn('id', $request->roles)->get();

        // Synchronize the user's roles with the selected roles
        $user->syncRoles($roles);

        return redirect()->route('tampilrole')->with('success', 'Roles updated successfully.');
    }

    public function create()
    {
        return view('superadmin.formtambahuser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|',
        ]);

        $user = User::create([
            'dosen_id' => $request->dosen_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('tampiluser.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('superadmin.formedituser', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'dosen_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|',
        ]);

        $user->update([
            'dosen_id' => $request->dosen_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('tampiluser.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('tampiluser.index')->with('success', 'User deleted successfully.');
    }

    public function tampilrole()
    {
        $roles = Role::all();
        $users = User::all();
        return view('superadmin.tampilrole', compact('roles', 'users'));
    }
}
