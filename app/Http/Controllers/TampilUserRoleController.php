<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TampilUserRoleController extends Controller
{
    public function index()
    {
        // Fetch all users with their roles
        $users = User::with('roles')->get();

        // Pass the users data to the view
        return view('superadmin.tampiluser', compact('users'));
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

        return redirect()->route('tampiluser.index')->with('success', 'Roles updated successfully.');
    }
}
