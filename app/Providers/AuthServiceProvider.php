<?php

namespace App\Providers;

use App\Models\Blog;
use App\Policies\BlogPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Blog::class => BlogPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('restore-blog', function ($user, $blog) {
            return $user->role === 'admin';
        });
    }
}