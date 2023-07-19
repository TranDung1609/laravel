<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Role;
use App\Policies\CommentPolicy;
use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Post;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class,
        Role::class => RolePolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user', [UserPolicy::class, 'view']);
//        Gate::define('create-user', [UserPolicy::class, 'create']);
//        Gate::define('delete-user', [UserPolicy::class, 'delete']);
//        Gate::define('update-user', [UserPolicy::class, 'update']);
        Gate::define('category', [CategoryPolicy::class, 'view']);

        Gate::define('view-post', [PostPolicy::class, 'view']);
        Gate::define('create-post', [PostPolicy::class, 'create']);
        Gate::define('delete-post', [PostPolicy::class, 'delete']);
        Gate::define('update-post', [PostPolicy::class, 'update']);
        Gate::define('restore-post', [PostPolicy::class, 'restore']);

        Gate::define('role', [RolePolicy::class, 'view']);

        Gate::define('create-comment', [CommentPolicy::class, 'create']);
        Gate::define('delete-comment', [CommentPolicy::class, 'delete']);
        Gate::define('view-comment', [CommentPolicy::class, 'view']);
    }
}
