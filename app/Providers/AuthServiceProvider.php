<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Note;
use App\Models\Profile;
use Illuminate\Auth\GenericUser;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('can-update-notes',function( GenericUser $profile, Note $note){
            return $note->profile_id === $profile->id;
        });
    }
}
