<?php

namespace App\Providers;

use App\Models\Configuration;
use App\Models\JobSeeker;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        view()->share('configuration', Configuration::first());

        // Tentukan variabel $profilexist berdasarkan kondisi autentikasi
        $profilexist = false;
        $user = Auth::user();

        if (Auth::check()) {
            $profilexist = JobSeeker::where('id', $user->id)->exists();
        }

        // Bagikan variabel $profilexist dan $user ke semua view
        view()->share('profilexist', $profilexist);
        view()->share('user', $user);
    }
}
