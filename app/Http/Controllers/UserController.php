<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index()
    {
        $this->authorize('browse_users');
        if (Auth::user()->roles->pluck('name')[0] == 'super-admin') {
            $users = User::paginate(10);
        } else {
            $users = User::whereHas("roles", function ($query) {
                $query->where('name', '!=', 'super-admin');
            })->paginate(10);
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create_users');
        $roles = Role::where('name', '!=', 'super-admin')->get();
        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create_users');
        if ($request->role == 'super-admin' && Auth::user()->roles->pluck('name')[0] != 'super-admin') {
            return redirect()->back()->with('info', 'You don\'t have the permission to create super-admin.');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User Created Successfully.');
    }

    public function show($id)
    {
        $this->authorize('view_users');
        $user = User::findOrFail($id);
        if ($user->roles->pluck('name')[0] == 'super-admin' && Auth::user()->roles->pluck('name')[0] != 'super-admin') {
            return redirect()->back()->with('info', 'Not found.');
        }
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $this->authorize('edit_users');
        $user = User::findOrFail($id);
        if ($user->roles->pluck('name')[0] == 'super-admin' && Auth::user()->roles->pluck('name')[0] != 'super-admin') {
            return redirect()->back()->with('info', 'Not found.');
        }
        $roles = Role::where('name', '!=', 'super-admin')->get();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->authorize('edit_users');
        $user = User::findOrFail($id);
        if ($user->roles->pluck('name')[0] == 'super-admin' && Auth::user()->roles->pluck('name')[0] != 'super-admin') {
            return redirect()->back()->with('info', 'Not found.');
        }
        if ($request->remove_avatar) {
            Storage::disk('avatar')->delete($user->avatar);
            $user->avatar = null;
        }
        if ($request->avatar) {
            if ($user->avatar != null) {
                Storage::disk('avatar')->delete($user->avatar);
            }
            $avatar = $request->file('avatar');
            $md5Name = md5_file($avatar->getRealPath());
            $guessExtension = $avatar->guessExtension();
            $newName = $md5Name . '.' . $guessExtension;
            Storage::disk('avatar')->put($newName, File::get($avatar), 'public');
            $user->avatar = $newName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->password) {
            $user->password = Hash::make($request->password);
        }
        if ($user->roles && $user->roles->pluck('name')[0] != 'super-admin') {
            $user->removeRole($user->roles->pluck('name')[0]);
            $user->assignRole($request->role);
        }
        $user->save();
        return redirect()->route('users.index')->with('success', 'User Updated Successfully.');
    }

    public function destroy($id)
    {
        $this->authorize('delete_users');
        $user = User::findOrFail($id);
        if ($user->roles->pluck('name')[0] == 'super-admin' && Auth::user()->roles->pluck('name')[0] != 'super-admin') {
            return redirect()->back()->with('info', 'Not found.');
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted Successfully.');
    }
}
