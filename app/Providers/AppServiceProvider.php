<?php

namespace App\Providers;


use App\Contracts\ParserContract;
use App\Contracts\Social;
use App\Http\Controllers\ParserController;
use App\Services\ParserService;
use App\Services\SocialAuthService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ParserContract::class,
            ParserService::class
        );
        $this->app->bind(
            Social::class,
            SocialAuthService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
