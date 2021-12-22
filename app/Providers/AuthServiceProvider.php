<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostOwner;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostOwner::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('addPic', function (User $user, User $user2) {
            return $user2->id === auth()->user()->id;
        });
    }
}
