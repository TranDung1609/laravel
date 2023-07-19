<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Enums\Permission;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id', $role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_POST, $permissions)
            || in_array(Permission::PERMISSION_VIEW_POST, $permissions);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id', $role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_POST, $permissions)
            || in_array(Permission::PERMISSION_CREATE_POST, $permissions);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Post $post)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id', $role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_POST, $permissions)
            || in_array(Permission::PERMISSION_EDIT_POST, $permissions)
            && $user->id == $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Post $post)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id', $role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_POST, $permissions)
            || in_array(Permission::PERMISSION_DELETE_POST, $permissions)
            && $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id', $role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_POST, $permissions);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
