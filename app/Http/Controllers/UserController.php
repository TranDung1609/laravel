<?php

namespace App\Http\Controllers;

use App\Enums\Author;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
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

        return Redirect::to('user/list-user')->with('message', 'Thêm User thành công');
    }

    public function edit($id)
    {
        $this->authorize('user');
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('admin.user.edit_user',
            [
                'user' => $user,
                'roles' => $roles
            ]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->authorize('user');
        $data = $request->all();
        $user = User::find($id)->fill($data);
        $user->roles()->sync($request->role_id);
        $user->update($data);
        return Redirect::to('user/list-user')->with('message', 'Update User thành công');
    }

    public function delete(Request $request)
    {
        $this->authorize('user');
        $user = User::find($request->id);
        $user->posts()->update([
            'user_id' => Author::ADMIN,
        ]);
        $user->comments()->delete();
        $user->delete();
        return Redirect::to('user/list-user')->with('message', 'Delete User thành công');
    }
    public function isDeleted()
    {
        $this->authorize('user');
        $users = User::onlyTrashed()->get();
        return view('admin.user.deleted_user', ['users' => $users]);
    }

    public function rollbackUser($id)
    {
        $this->authorize('user');
        $user = User::withTrashed()->where('id', $id);
        $user->restore();
        return Redirect::to('user/list-user')->with('message', 'Rollback User thành công');
    }
}
