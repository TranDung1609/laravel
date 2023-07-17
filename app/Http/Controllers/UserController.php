<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function addUser()
    {
        return view('admin.user.add_user');
    }
    public function index()
    {
        $users = User::all();
        return view('admin.user.list_user', ['users' => $users]);
    }
    public function insert(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        Auth::login($user);
        return Redirect::to('user/list-user');
    }
    public function edit($id)
    {
        $user = User::where('id', $id)->get();
        return view('admin.user.edit_user', ['users' => $user]);
    }
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->all();
        User::find($id)->update($data);
        return Redirect::to('user/list-user');
    }
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return Redirect::to('user/list-user');
    }
    public function isDeleted()
    {
        $users = User::onlyTrashed()->get();
        return view('admin/user/deleted_user', ['users' => $users]);
    }

    public function rollbackUser($id)
    {
        User::withTrashed()->where('id',$id)->restore();
        return Redirect::to('user/list-user');
    }
}
