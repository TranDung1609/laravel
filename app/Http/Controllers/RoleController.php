<?php

namespace App\Http\Controllers;

use App\Enums\Permission;
use App\Models\Permission as ModelsPermission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public function addRole()
    {
        $this->authorize('role');
        $permissions = ModelsPermission::all();
        return view('admin.role.add_role', ['permissions' => $permissions]);
    }
    public function index()
    {
        $this->authorize('role');
        $roles = Role::all();
        return view('admin.role.list_role', ['roles' => $roles]);
    }
    public function insert(Request $request)
    {
        $this->authorize('role');
        $data = $request->all();
        $role = new Role();
        $role->fill($data)->save();
        $role->permissions()->attach($request->permission_id);
        return Redirect::to('role/list-role');
    }
    public function edit($id)
    {
        $this->authorize('role');
        $permissions = ModelsPermission::all();
        $role = Role::where('id', $id)->get();
        return view('admin.role.edit_role', ['role' => $role], ['permissions' => $permissions]);
    }
    public function update(Request $request, $id)
    {
        $this->authorize('role');
        $data = $request->all();
        $role = Role::find($id)->fill($data);
        $role->permissions()->sync($request->permission_id);
        $role->update($data);

        return Redirect::to('role/list-role');
    }
    public function delete(Request $request)
    {
        $this->authorize('role');
        $role = Role::find($request->id);
        $role->delete();
        return Redirect::to('role/list-role');
    }
    public function isDeleted()
    {
        $this->authorize('role');
        $roles = Role::onlyTrashed()->get();
        return view('admin.role.deleted_role', ['roles' => $roles]);
    }
    public function rollbackRole($id)
    {
        $this->authorize('role');
        Role::withTrashed()->where('id', $id)->restore();
        return Redirect::to('role/list-role');
    }

}
