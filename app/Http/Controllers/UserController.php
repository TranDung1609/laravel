<?php

namespace App\Http\Controllers;

use App\Enums\Permission;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public $permissions;

    public function addUser()
    {
        $this->authorize('user');
        $roles = Role::all();
        return view('admin.user.add_user', ['roles' => $roles]);
    }

    public function index()
    {
        $this->authorize('user');
        $users = User::all();
        return view('admin.user.list_user', ['users' => $users]);
    }

    public function insert(UserRequest $request)
    {
        $this->authorize('user');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach($request->role_id);
        event(new Registered($user));

        Auth::login($user);
        return Redirect::to('user/list-user');
    }

    public function edit($id)
    {
        $this->authorize('user');
        $roles = Role::all();
        $user = User::where('id', $id)->get();
        return view('admin.user.edit_user', ['users' => $user], ['roles' => $roles]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->authorize('user');
        $data = $request->all();
        $user = User::find($id)->fill($data);
        $user->roles()->sync($request->role_id);
        $user->update($data);

        return Redirect::to('user/list-user');
    }

    public function delete(Request $request)
    {
        $this->authorize('user');
        $user = User::find($request->id);
        $user->delete();
        return Redirect::to('user/list-user');
    }

    public function isDeleted()
    {
        $this->authorize('user');
        $users = User::onlyTrashed()->get();
        return view('admin/user/deleted_user', ['users' => $users]);
    }

    public function rollbackUser($id)
    {
        $this->authorize('user');
        User::withTrashed()->where('id', $id)->restore();
        return Redirect::to('user/list-user');
    }
}
