<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $livewireTmp = storage_path('app/livewire-tmp');
        if (! is_dir($livewireTmp)) {
            mkdir($livewireTmp, 0755, true);
        }
    }
}
