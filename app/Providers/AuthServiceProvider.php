<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\PostPolicy;
use App\Policies\CommentPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

        Post::class => PostPolicy::class,
        
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
        Gate::define('delete-post', [PostPolicy::class, 'delete']);
        Gate::define('update-post', [PostPolicy::class, 'update']);

        Gate::define('delete-comment', [CommentPolicy::class, 'delete']);
        Gate::define('update-comment', [CommentPolicy::class, 'update']);


    }
}
