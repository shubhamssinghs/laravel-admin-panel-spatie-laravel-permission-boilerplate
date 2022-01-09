<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('browse_roles');
        if(Auth::user()->roles->pluck('name')[0] == 'super-admin')
        {
            $roles = Role::paginate(10);
        }else {
            $roles = Role::where('name','!=','super-admin')->paginate(10);
        }

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $this->authorize('create_roles');
        return view('roles.create');
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('create_roles');
        Role::create([
            'name' => $request->name
        ]);
        return redirect()->route('roles.index')->with('success', 'Role Created Successfully.');
    }

    public function show($id)
    {
        $this->authorize('view_roles');
        $role = Role::findOrFail($id);
        if ($role->name == 'super-admin') {
            return redirect()->back()->with('info', 'All permissions to super-admin.');
        }
        $permissions = Permission::all();
        return view('roles.show', compact('role', 'permissions'));
    }

    public function edit($id)
    {
        $this->authorize('edit_roles');
        $role = Role::findOrFail($id);
        if ($role->name == 'super-admin') {
            return redirect()->back()->with('info', 'You cannot edit super-admin.');
        }
        return view('roles.edit', compact('role'));
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        $this->authorize('edit_roles');
        $role = Role::findOrFail($id);
        if ($role->name == 'super-admin') {
            return redirect()->back()->with('info', 'You cannot edit super-admin.');
        }
        $role->name = $request->name;
        $role->update();
        return redirect()->route('roles.index')->with('success', 'Role Update Successfully.');
    }

    public function destroy($id)
    {
        $this->authorize('delete_roles');
        $role = Role::findOrFail($id);
        if ($role->name == 'super-admin') {
            return redirect()->back()->with('info', 'You cannot delete super-admin.');
        }
        if($role->permissions()->count()) {
            return redirect()->back()->with('error', 'You cannot delete a role that has permissions assigned.');
        }
        $user = User::whereHas('roles', function (Builder $query) use ($role) {
            $query->where('name', $role->name);
         })->count();
         if($user) {
            return redirect()->back()->with('error', 'You cannot delete a role that has been assigned to user.');
        }
        $role->delete();
        return redirect()->back()->with('success', 'Role Deleted Successfully.');
    }

    public function updatePermission(Request $request)
    {
        $this->authorize('edit_permissions');
        $role = Role::where('name', $request->role)->first();
        $permissions = $request->permissions;
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')->with('success', 'Permission Update Successfully.');
    }
}
