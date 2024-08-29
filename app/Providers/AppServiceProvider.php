<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Admin\Source\ProviderSource;
use App\Services\Admin\Source\PipeDriveSource;
use App\Services\Admin\Source\WebsiteSource;
use App\Services\Admin\Source\SalesforceSource;

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
        // $this->app->bind(ProviderSource::class, PipeDriveSource::class);
        // $this->app->bind(ProviderSource::class, WebsiteSource::class);
        $this->app->bind(ProviderSource::class, SalesforceSource::class);
    }
}
