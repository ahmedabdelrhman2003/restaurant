<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('product', function (User $user) {

            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'product') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('card', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'card') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('about', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'about') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('feedback', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'feedback') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });

        Gate::define('kitchen', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {

                if ($value->name === 'kitchen') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('delivery', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'delivery') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('admin', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'admin') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
    }
}
