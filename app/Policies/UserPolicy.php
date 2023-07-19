<?php

namespace App\Policies;

use App\Enums\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use function PHPSTORM_META\map;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        // laasy dah sach role cuar user dang dang nhap
        //lay tat permission cuar role do
        //sau do check permissions cuar tat ca role cua nguoi dung voi permsionCode can kiem tra
        $role_id = $user->roles->pluck('id');

        $role_models = Role::whereIn('id',$role_id)->get();
        // $permissionCodes = Role::whereIn('id',$role_id)->permissions->pluck('id');
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        // dd($permissions);
        // $permissionCodes = $user->roles()->pluck("permissions")->permissions()->pluck('name');
        return in_array(Permission::PERMISSION_MANAGEMENT_USER, $permissions);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id',$role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_USER, $permissions);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id',$role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_USER, $permissions);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id',$role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_USER, $permissions);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
