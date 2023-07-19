<?php

namespace App\Policies;

use App\Enums\Permission;
use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id',$role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_COMMENT, $permissions);

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
        return in_array(Permission::PERMISSION_MANAGEMENT_COMMENT, $permissions)
            || in_array(Permission::PERMISSION_CREATE_COMMENT, $permissions);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Comment $comment)
    {
        $role_id = $user->roles->pluck('id');
        $role_models = Role::whereIn('id', $role_id)->get();
        $permissions = [];
        foreach ($role_models as $role_model) {
            $permissions = array_merge($role_model->permissions->pluck('code')->toArray(), $permissions);
        }
        return in_array(Permission::PERMISSION_MANAGEMENT_COMMENT, $permissions)
            || in_array(Permission::PERMISSION_DELETE_COMMENT, $permissions)
            && $user->id === $comment->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Comment $comment)
    {
        //
    }
}
