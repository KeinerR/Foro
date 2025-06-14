<?php

namespace App\Providers;

use App\Models\Reply\Reply;
use App\Models\Thread;
use App\Policies\RepliPolice;
use App\Policies\ThreadPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    Gate::policy(Reply::class, RepliPolice::class);
    Gate::policy(Thread::class, ThreadPolicy::class);

    

    }
}
